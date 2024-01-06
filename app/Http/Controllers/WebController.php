<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Onlineshop\Entities\OnliItem;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use Intervention\Image\Facades\Image;
use Intervention\Image\Font;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Modules\Socialevents\Entities\EvenEvent;
use Modules\Socialevents\Entities\EvenEventTicketClient;

class WebController extends Controller
{
    public function index()
    {
        return view('jrrss/index');
    }

    public function quienessomos()
    {
        return view('jrrss/quienes-somos');
    }

    public function sedes()
    {
        return view('jrrss/sedes');
    }

    public function cobertura()
    {
        return view('jrrss/cobertura');
    }

    public function eventos()
    {
        $event = EvenEvent::with('exhibitors.exhibitor')
            ->with('category')
            ->with('prices.type')
            ->where('status', 'PE')
            ->orderBy('date_start', 'DESC')
            ->first();

        $ubigeo = District::join('provinces', 'province_id', 'provinces.id')
            ->join('departments', 'provinces.department_id', 'departments.id')
            ->select(
                'districts.id AS district_id',
                DB::raw("CONCAT(departments.name, ' - ',provinces.name,' - ',districts.name) AS city_name")
            )
            ->get();

        return view('jrrss/eventos', [
            'event' => $event,
            'ubigeo' => $ubigeo
        ]);
    }

    public function eventospagar($id)
    {
        $ticket = EvenEventTicketClient::with('event')
            ->with('type')
            ->where('id', $id)
            ->where('status', false)
            ->first();

        $preference_id = null;

        if ($ticket) {
            try {
                MercadoPagoConfig::setAccessToken(env('MERCADOPAGO_TOKEN'));
                $client = new PreferenceClient();

                //dd($mp_items);
                $preference = $client->create([
                    "items" => array(
                        array(
                            'id' => $ticket->event->id,
                            'category_id' => $ticket->type->type_id,
                            'title' => $ticket->event->title,
                            'quantity'      => $ticket->quantity,
                            'currency_id'   => 'PEN',
                            'unit_price'    => floatval($ticket->type->price)
                        )
                    ),
                    "back_urls" =>  array(
                        'success' => route('web_gracias', $ticket->id),
                        // 'failure' => route('onlineshop_response_mercadopago'),
                        // 'pending' => route('onlineshop_response_mercadopago')
                    )
                ]);
                $preference_id =  $preference->id;
            } catch (\MercadoPago\Exceptions\MPApiException $e) {
                // Manejar la excepción
                $response = $e->getApiResponse();
                dd($response); // Mostrar la respuesta para obtener más detalles
            }
        }
        return view('jrrss/eventos-pagar', [
            'ticket' => $ticket,
            'preference_id' => $preference_id
        ]);
    }

    public function gracias(Request $request, $id)
    {
        $ticket = EvenEventTicketClient::where('id', $id)
            ->where('status', false)
            ->first();

        $ticket->status = true;
        $ticket->response_status = $request->get('collection_status');
        $ticket->response_id = $request->get('collection_id');
        $ticket->response_date_approved = Carbon::now()->format('Y-m-d');
        $ticket->response_payer = json_encode($request->all());
        $ticket->response_payment_method_id = $request->get('payment_type');
        $ticket->save();
        // $ticket = $ticket->with('event')->with('type');
    }

    public function escuelasobrenatural()
    {
        return view('jrrss/escuela-sobrenatural');
    }

    public function ecelt()
    {
        return view('jrrss/ecelt');
    }

    public function rmnt()
    {
        return view('jrrss/rmnt');
    }

    public function kids()
    {
        return view('jrrss/kids');
    }

    public function testimonios()
    {
        return view('jrrss/testimonios');
    }

    public function contacto()
    {
        return view('jrrss/contacto');
    }

    public function donar()
    {
        return view('jrrss/donar');
    }

    public function gracias_por_donar($donador)
    {
        return view('jrrss/gracias-por-donar', compact('donador'));
    }

    public function testimage($content, $fecha = null)
    {


        if ($fecha == null) {
            echo "Agrega un Slash '/' y agrega la fecha ejemplo 'test-image/Miguel de Cervantes Saavedra/23-01-2021'";
        } else {
            // create Image from file
            $img = Image::make('https://aprendiendoconsira.com/wp-content/uploads/2022/06/5-2000x1000.png');


            // write text
            //$img->text('The quick brown fox jumps over the lazy dog.');

            // write text at position
            //$img->text('The quick brown fox jumps over the lazy dog.', 120, 100);

            $img->text($content, 1070, 496, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(72);
                $font->color('#0d0603');
                $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });

            $img->text("Entregado el: " . $fecha, 120, 15, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(40);
                $font->color('#0d0603');
                $font->align('left');
                $font->valign('top');
                $font->angle(0);
            });

            $img->text("Pragot Especialistas en Especialización y mejora continua.", 1840, 15, function ($font) {
                $font->file('fonts/OLDENGL.TTF');
                $font->size(40);
                $font->color('#0d0603');
                $font->align('right');
                $font->valign('top');
                $font->angle(0);
            });

            $qr = Image::make('https://borealtech.com/wp-content/uploads/2018/10/codigo-qr-1024x1024-1.jpg');
            $qr->fit(200, 200);
            $img->insert($qr, 'bottom-left', 30, 30);


            // Ejemplo de Redimensionar la imagen manteniendo la proporción para avatares y similares
            // Establecer el ancho máximo y la altura máxima deseados
            $maxWidth = 1550;
            $maxHeight = 1550;
            $img->resize($maxWidth, $maxHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });



            // Obtener el contenido binario de la imagen
            $imageContent = $img->encode('png');


            // Generar la respuesta HTTP con la imagen
            $response = Response::make($imageContent);

            // Establecer el tipo de contenido de la respuesta como imagen PNG
            $response->header('Content-Type', 'image/png');

            // Retornar la respuesta
            return $response;
        }
    }
}
