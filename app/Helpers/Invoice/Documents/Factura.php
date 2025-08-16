<?php

namespace App\Helpers\Invoice\Documents;

use Greenter\Model\Client\Client;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Sale\Legend;
use Greenter\Model\Sale\Invoice;
use App\Models\SaleDocument;
use App\Helpers\Invoice\Util;
use Carbon\Carbon;
use DateTime;
use App\Models\Company as MyCompany;
use App\Models\LocalSale;
use App\Models\User;
use Exception;
use Greenter\Model\Company\Address;
use Greenter\Model\Company\Company;
use Greenter\Model\Sale\FormaPagos\FormaPagoContado;
use Greenter\Model\Sale\FormaPagos\FormaPagoCredito;
use Greenter\Model\Sale\Charge;
use Greenter\Model\Sale\Detraction;
use App\Helpers\Invoice\QrCodeGenerator;
use App\Models\District;
use App\Models\Kardex;
use App\Models\KardexSize;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDocumentItem;
use App\Models\SaleProduct;
use Illuminate\Support\Facades\DB;
use Greenter\Model\Sale\Cuota;
class Factura
{
    protected $see;
    protected $util;
    protected $mycompany;

    public function __construct()
    {
        $this->util = Util::getInstance();
        $this->mycompany = MyCompany::first();
    }
    public function create($document_id)
    {
        try {
            $document = SaleDocument::with(['quotas' => function ($query) {
                $query->orderBy('due_date', 'asc'); // Ordena las cuotas por fecha de pago ascendente
            }])->find($document_id);

            $invoice = $this->setDocument($document);
            $see = $this->util->getSee();
            $res = $see->send($invoice);
            //fecha en la que se envio a sunat el documento
            $document->invoice_send_date = Carbon::now();

            $document->invoice_xml = $this->util->writeXml($invoice, $see->getFactory()->getLastXml());
            $document->invoice_document_name = $invoice->getName();
            $notes = null;
            $status = null;

            if ($res->isSuccess()) {
                /**@var $res \Greenter\Model\Response\BillResult*/
                $cdr = $res->getCdrResponse();
                $codeError = $cdr->getCode();
                $messageError = $cdr->getDescription();
                $notes = json_encode($cdr->getNotes(), JSON_UNESCAPED_UNICODE);
                if ($cdr->getCode() == 0) {
                    $status = 'Aceptada';
                } elseif ($cdr->getCode() == 2325) {
                    $status = 'Pendiente';
                }

                $document->invoice_cdr = $this->util->writeCdr($invoice, $res->getCdrZip());
            } else {
                $error = $res->getError();
                $codeError = $error->getCode();
                $messageError = $error->getMessage();
                $status = 'Rechazada';
                //return array('success' => $res->isSuccess(), 'details' => $this->util->getErrorResponse($res->getError()));

            }
            $document->invoice_response_code = $codeError;
            $document->invoice_response_description = $messageError;
            $document->invoice_notes = $notes;
            $document->invoice_status = $status;

            $document->save();

            return array('success' => $res->isSuccess(), 'code' => $codeError, 'message' => $messageError, 'notes' => $notes);
        } catch (\Exception $e) {
            return array('success' => false, 'code' => 0, 'message' => $e->getMessage(), 'notes' => 'Error de falta de datos en el sistema');
        }
    }

    public function setDocument($document, $tipDet = '022', $ipMeP = '001')
    {
        $establishment = LocalSale::find($document->sale->local_id);
        $province = $establishment->district->province;

        $department = $province->department;
        $broadcast_date = new DateTime($document->invoice_broadcast_date . ' ' . Carbon::parse($document->created_at)->format('H:m:s'));
        // Cliente
        $clientCity = District::with('province.department')->where('id',$document->client_ubigeo_code)->first();

        $client = (new Client())
            ->setTipoDoc($document->client_type_doc)
            ->setNumDoc($document->client_number)
            ->setRznSocial($document->client_rzn_social);

        if($clientCity ){
            $clientAddress = (new Address())
                ->setUbigueo($document->client_ubigeo_code)
                ->setDepartamento($clientCity->province->department->name)
                ->setProvincia($clientCity->province->name)
                ->setDistrito($clientCity->name)
                ->setUrbanizacion('-')
                ->setDireccion($document->client_address);

            $client->setAddress($clientAddress);
        }

        //dd($client);
        // Emisor
        $address = (new Address())
            ->setUbigueo($establishment->ubigeo)
            ->setDepartamento($department->name)
            ->setProvincia($province->name)
            ->setDistrito($establishment->district->name)
            ->setUrbanizacion('-')
            ->setDireccion($establishment->address)
            ->setCodLocal($establishment->sunat_code); // Codigo de establecimiento asignado por SUNAT, 0000 por defecto.

        $company = (new Company())
            ->setRuc($this->mycompany->ruc)
            ->setRazonSocial($this->mycompany->business_name)
            ->setNombreComercial($this->mycompany->tradename)
            ->setEmail($this->mycompany->email)
            ->setTelephone($this->mycompany->phone)
            ->setAddress($address);

        // Venta
        $invoice = new Invoice();

        if($document->forma_pago == 'Contado'){
            $invoice->setFormaPago(new FormaPagoContado()); // FormaPago: Contado
        }else{

            $cuotasGreenter = [];
            foreach ($document->quotas as $key => $quota) {
                $dueDateStr = $quota->due_date ?? null;
                $amount = $quota->amount ?? 0.01;
                try {
                    // Paso CRÍTICO: Crea un objeto DateTime a partir de la cadena de fecha
                    $fechaPago = new DateTime($dueDateStr);

                    $cuotasGreenter[] = (new Cuota())
                        ->setMonto((float) $amount) // Asegúrate de que el monto sea float
                        ->setFechaPago($fechaPago);

                } catch (\Exception $e) {
                    continue;
                }
            }

            $invoice->setFormaPago(new FormaPagoCredito($document->overall_total))
                ->setCuotas($cuotasGreenter); // FormaPago: Credito
        }

        $invoice->setUblVersion($document->invoice_ubl_version)
            ->setTipoOperacion($document->invoice_type_operation)
            ->setTipoDoc($document->invoice_type_doc)
            ->setSerie($document->invoice_serie)
            ->setCorrelativo($document->invoice_correlative)
            ->setFechaEmision($broadcast_date)
            ->setTipoMoneda('PEN')
            ->setCompany($company)
            ->setClient($client)
            ->setMtoOperGravadas($document->invoice_mto_oper_taxed)
            ->setMtoIGV($document->invoice_mto_igv)
            ->setTotalImpuestos($document->invoice_total_taxes)
            ->setValorVenta($document->invoice_value_sale)
            ->setSubTotal($document->invoice_subtotal)
            ->setMtoImpVenta($document->invoice_mto_imp_sale);

        if ($document->additional_description) {
            $invoice->setObservacion($document->additional_description);
        }



        $details = $document->items;
        $items = [];
        foreach ($details as $detail) {

            $item = new SaleDetail();

            $item->setCodProducto($detail->cod_product)
                ->setUnidad($detail->unit_type)
                ->setCantidad($detail->quantity)
                ->setDescripcion($detail->decription_product)
                ->setMtoBaseIgv($detail->mto_base_igv)
                ->setPorcentajeIgv($detail->percentage_igv)
                ->setIgv($detail->igv)
                ->setTipAfeIgv($detail->type_afe_igv)
                ->setTotalImpuestos($detail->total_tax)
                ->setMtoValorVenta($detail->mto_value_sale)
                ->setMtoValorUnitario($detail->mto_value_unit)
                ->setMtoPrecioUnitario($detail->mto_price_unit);

            $descuent = $detail->mto_discount;

            if ($descuent > 0) {
                $item->setDescuento($descuent);
                $json_discounts = json_decode($detail->json_discounts);

                $charges = [];

                foreach ($json_discounts as $k => $json_discount) {
                    $charges[$k] = (new Charge())
                        ->setCodTipo($json_discount->type)
                        ->setMontoBase($json_discount->base)
                        ->setFactor($json_discount->factor)
                        ->setMonto($json_discount->monto);
                }

                $item->setDescuentos($charges);
            }

            array_push($items, $item);
        }

        $legend = new Legend();

        $legend->setCode($document->invoice_legend_code)
            ->setValue($document->invoice_legend_description);


        if ($document->invoice_type_operation == '1001') {
            $valuePercent = 0.12; // 12% del total de la venta
            $percent = 12;
            $totalV = $document->invoice_mto_imp_sale;
            $detMount = $totalV * $valuePercent;
            $invoice->setDetraccion(
                // MONEDA SIEMPRE EN SOLES
                (new Detraction())
                    // Carnes y despojos comestibles
                    ->setCodBienDetraccion($tipDet) // catalog. 54
                    // Deposito en cuenta
                    ->setCodMedioPago($ipMeP) // catalog. 59
                    ->setCtaBanco($this->mycompany->withdrawal_account_number)
                    ->setPercent($percent)
                    ->setMount($detMount)
            );

            $legendDetraccion =  new Legend();

            $legendDetraccion->setCode('2006')
                ->setValue('Operación sujeta a detracción');

            $invoice->setLegends([$legend, $legendDetraccion]);
        } else {
            $invoice->setLegends([$legend]);
        }


        $invoice->setDetails($items);

        //dd($invoice);
        return $invoice;
    }

    public function getFacturaDomPdf($id, $format = 'A4')
    {
        try {
            $document = SaleDocument::find($id);
            $invoice = $this->setDocument($document);

            $generator = new QrCodeGenerator(300);
            $dir = public_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'tmp_qr';

            $cadenaqr = $this->stringQr($document);

            $qr_path = $generator->generateQR($cadenaqr, $dir, $invoice->getName() . '.png', 8, 2);

            $seller = User::find($document->user_id);
            $pdf = $this->util->generatePdf($invoice, $seller, $qr_path, $format, $document->status, $document->forma_pago);

            $document->invoice_pdf = $pdf;
            $document->save();

            return array(
                'fileName' => $invoice->getName() . '.pdf',
                'filePath' => $document->invoice_pdf
            );
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function getFacturaPdf($id)
    {
        try {
            $document = SaleDocument::find($id);
            $invoice = $this->setDocument($document);
            $seller = User::find($document->user_id);
            $pdf = $this->util->getPdf($invoice, $seller);
            $filePath = $this->util->showPdf($pdf, $invoice->getName() . '.pdf');
            $document->invoice_pdf = $filePath;
            $document->save();

            return array(
                'fileName' => $invoice->getName() . '.pdf',
                'filePath' => $filePath
            );
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    public function getFacturaXML($id)
    {
        try {
            $document = SaleDocument::find($id);

            return array(
                'fileName' => $document->invoice_document_name . '.xml',
                'filePath' => $document->invoice_xml
            );
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    public function getFacturaCDR($id)
    {
        try {
            $document = SaleDocument::find($id);

            return array(
                'fileName' => $document->invoice_document_name . '.zip',
                'filePath' => $document->invoice_cdr
            );
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function stringQr($document)
    {
        return $this->mycompany->ruc . '|' . $document->invoice_type_doc . '|' . $document->invoice_serie . '|' . $document->invoice_correlative . '|' . $document->invoice_mto_imp_sale . '|' . $document->invoice_broadcast_date . '|' . $document->client_type_doc . '|' . $document->client_number;
    }

    public function updateStockSale($id)
    {
        try {
            $res = DB::transaction(function () use ($id) {
                $document = SaleDocument::find($id);

                $sale = Sale::find($document->sale_id);
                $sale->update(['status' => false]);

                $products = SaleProduct::where('sale_id', $sale->id)->get();

                foreach ($products as $item) {
                    // solo si son productos no aplica a los servicios
                    if (json_decode($item->saleProduct)->unit_type != 'ZZ') {

                        $k = Kardex::create([
                            'date_of_issue' => Carbon::now()->format('Y-m-d'),
                            'motion' => 'sale',
                            'product_id' => $item->product_id,
                            'local_id' => $sale->local_id,
                            'quantity' => $item->quantity,
                            'document_id' => $document->id,
                            'document_entity' => SaleDocument::class,
                            'description' => 'Anulacion de Venta'
                        ]);

                        $product = Product::find($item->product_id);

                        if ($product->presentations) {

                            KardexSize::create([
                                'kardex_id' => $k->id,
                                'product_id' => $item->product_id,
                                'local_id' => $sale->local_id,
                                //'size'      => json_decode($produc->product)->size,
                                'size'      => json_decode($item->saleProduct)->size,
                                'quantity'  => $item->quantity
                            ]);

                            $tallas = json_decode($product->sizes, true);

                            $n_tallas = [];
                            foreach ($tallas as &$size) {
                                // Si el tamaño es igual a 22
                                if ($size["size"] == json_decode($item->saleProduct)->size) {

                                    // Obtiene la cantidad actual
                                    $currentQuantity = intval($size["quantity"]); // Convierte a entero

                                    // Suma 1 a la cantidad actual
                                    $newQuantity = $currentQuantity + $item->quantity;

                                    // Actualiza la cantidad
                                    $size["quantity"] = $newQuantity;
                                }
                            }

                            $n_tallas = $tallas;

                            $product->update([
                                'sizes' => json_encode($n_tallas)
                            ]);
                        }
                        Product::find($item->product_id)->increment('stock', $item->quantity);
                    }
                }
                return $sale;
            });

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}
