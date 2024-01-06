<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\DonationLog;

class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        // //dd($request->amount);
        $amount = $request->amount;
        $donation_destinity_id = $request->donation_destinity_id;
        $full_name = $request->full_name;
        $provider = new PayPalClient;
        $provider = \PayPal::setProvider();
        $currency = env('PAYPAL_CURRENCY');
        //$provider->setCurrency('PEN'); //si desea pagar en soles debe habilitarse esto en un if

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

    public function success($donation_id, Request $request){
      $provider = new PayPalClient;
      $provider = \PayPal::setProvider();
      $paypalToken = $provider->getAccessToken();

      $response = $provider->capturePaymentOrder($request->token);
      $email = $response['payer']['email_address'];
      $countryCode = $response['payer']['address']['country_code'];

      if(isset($response['status']) && $response['status'] == "COMPLETED"){
        $donation = DonationLog::find($donation_id);
        $donation->status_order = "SU"; //Successful transacción exitosa
        $donation->email = $email;
        $donation->country_origin = $countryCode;
        $donation->save();
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
