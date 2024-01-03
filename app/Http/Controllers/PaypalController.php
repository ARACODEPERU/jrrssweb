<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        // //dd($request->amount);
        $amount = $request->amount;
        $provider = new PayPalClient;
        $provider = \PayPal::setProvider();
        $currency = env('PAYPAL_CURRENCY');
        //$provider->setCurrency('PEN'); //si desea pagar en soles debe habilitarse esto en un if

        // Desde Aquí se debe registrar y poner en pendiente en la tabla de donations_logs
        $paypalToken = $provider->getAccessToken();

        $data = array(
          "intent" => "CAPTURE",
          "application_context" => [
            "return_url" => route('paypal_success'),
            "cancel_url" => route('paypal_cancel'),
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

    public function success(Request $request){
      $provider = new PayPalClient;
      $provider = \PayPal::setProvider();
      $paypalToken = $provider->getAccessToken();

      $response = $provider->capturePaymentOrder($request->token);
      dd($response);
      if(isset($response['status']) && $response['status'] == "COMPLETED"){
        return "Payment is succesful";
      }else{
        return $redirect()->route('paypal_cancel');      
      }
    }

    public function cancel(){
      return redirect()->away('https://www.google.com/peru');
    }
}
