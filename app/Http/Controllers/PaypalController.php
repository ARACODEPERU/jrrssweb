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
        $provider = new PayPalClient();
        $provider = setApiCredentials(config('paypal'));
        $currency = env('PAYPAL_CURRENCY');
        //$provider->setCurrency('PEN'); //si desea pagar en soles debe habilitarse esto en un if
        $paypalToken = $provider->getAccessToken();

        // $response = $provider->createOrder([
        //     "intent" => "CAPTURE",
        //     "application_context" => [
        //         "return_url" => route('paypal_success'),
        //         "cancel_url" => route('paypal_cancel'),
        //     ],
        //     "purchase_units" => [
        //         "amount" => [
        //             "currency_code" => $currency,
        //             "value" => $amount,
        //         ],
        //     ],
        // ]);

        $data = json_decode('{
            "intent": "CAPTURE",
            "purchase_units": [
              {
                "amount": {
                  "currency_code": "USD",
                  "value": "100.00"
                }
              }
            ]
        }', true);
        
        $order = $provider->createOrder($data);

        //dd($response);
    }
}
