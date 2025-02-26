<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\DonationLog;
use App\Models\DonationDestinity;
use Modules\Socialevents\Entities\EvenEventDonation;
use Carbon\Carbon;
class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        if($request->currency == "soles"){
            //código de Mercado Pago MercadoPago
            dd("Implementar MercadoPago");
        }else{
        $amount = $request->amount;
        $donation_destinity_id = $request->donation_destinity_id;
        $full_name = $request->full_name;
        $provider = new PayPalClient;
        $provider = \PayPal::setProvider();
        $currency = env('PAYPAL_CURRENCY');
        //$provider->setCurrency('PEN'); //si desea pagar en soles debe habilitarse esto en un if PEN no soporta PAYPAL

        // Desde Aquí se debe registrar y poner en pendiente en la tabla de donations_logs
        $donation = new DonationLog();  // creamos y dejamos en PE pendiente hasta que se confirme el pago
        $donation->donation_destinity_id = $donation_destinity_id; // Reemplaza $donationDestinityId con el ID correcto de la donation_destinity relacionada
        $donation->payment_origin = "paypal";
        $donation->currency = "USD";
        $donation->gross_amount = $amount;
        $donation->commission = ($amount*0.054)+0.3;
        $donation->net_amount = $amount - (($amount*0.054)+0.3);
        $donation->status_order = "PE"; //PENDIENTE
        $donation->name = $full_name;
        $donation->save();

        $paypalToken = $provider->getAccessToken();

        $data = array(
          "intent" => "CAPTURE",
          "application_context" => [
            "return_url" => route('paypal_success', $donation->id),
            "cancel_url" => route('paypal_cancel', $donation->id),
        ],
          "purchase_units" => array(
              array(
                  "amount" => array(
                      "currency_code" => $currency,
                      "value" => $amount
                  )
              )
          )
      );

        $response = $provider->createOrder($data);

        //dd($response);

        if(isset($response['id']) && $response['id'] != null){
          foreach($response['links'] as $link){
            if($link['rel'] === 'approve'){
              return redirect()->away($link['href']);
            }
          }
        }else{
          return $redirect()->route('paypal_cancel');
        }


        }

    }

    public function success($donation_id, Request $request){
      $provider = new PayPalClient;
      $provider = \PayPal::setProvider();
      $paypalToken = $provider->getAccessToken();

      $response = $provider->capturePaymentOrder($request->token);
      $email = $response['payer']['email_address'];
      $countryCode = $response['payer']['address']['country_code'];

      $donation = null;
      if(isset($response['status']) && $response['status'] == "COMPLETED"){
        $donation = DonationLog::find($donation_id);
        $donation->status_order = "SU"; //Successful transacción exitosa
        $donation->email = $email;
        $donation->country_origin = $countryCode;
        $donation->save();

        //registrando en la tabla Correspondiente
        $evenEventDonation = new EvenEventDonation();
        $evenEventDonation->nombres = $donation->name;
        $evenEventDonation->monto = $donation->gross_amount;
        $evenEventDonation->tipo_donacion = DonationDestinity::find($donation->donation_destinity_id)->name;
        $evenEventDonation->status = true;
        $evenEventDonation->response_status = $donation->status_order;
        $evenEventDonation->response_id = null;
        $evenEventDonation->response_date_approved = Carbon::now()->format('Y-m-d');
        $evenEventDonation->response_payer = json_encode($donation->all());
        $evenEventDonation->response_payment_method_id = null;
        $evenEventDonation->origen_pago = "Paypal";
        $evenEventDonation->tipo_moneda = "USD";
        $evenEventDonation->comision = 5.4; // % comision de paypal
        $evenEventDonation->comision_fija =  0.3; //comision fija de paypal en Dolares
        $evenEventDonation->save();

        return redirect()->route('web_gracias_por_donar', ['donador' => $donation->name]);
      }else{
        $donation = DonationLog::find($donation_id);
        $donation->status_order = "CA"; //Cancelado transacción no llevada a cabo
        $donation->save();
        return redirect()->route('cms_principal');
      }
    }

    public function cancel($donation_id){
        $donation = DonationLog::find($donation_id);
        $donation->status_order = "CA"; //Cancelado transacción no llevada a cabo
        $donation->save();
        return redirect()->route('cms_principal');
    }
}
