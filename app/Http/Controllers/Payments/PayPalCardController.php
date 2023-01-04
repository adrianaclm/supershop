<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Console\Application;
use App\Models\Solution;

class PayPalCardController extends Controller
{
    private $client;
    private $clientId;
    private $secret;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);

        $this->clientId = env( 'PAYPAL_CLIENT_ID');
        $this->secret = env( 'PAYPAL_SECRET');
    }

    private function getAccessToken()
    {
        $response = $this->client->request('POST', '/v1/oauth2/token', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type'      => 'application/x-www-form-urlencoded',
                ],
                'body' => 'grant_type=client_credentials',
                'auth' => [
                    $this->clientId, $this->secret, 'basic'
                ]
            ]
        );

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    // https://api-m.sandbox.paypal.com/v2/checkout/orders
    public function process($orderId, Request $request)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->request('GET', '/v2/checkout/orders/'. $orderId, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization'      => "Bearer $accessToken",
            ]
        ]);
        
        //return (string) ($response->getBody());
        $data = json_decode($response->getBody(), true);

        if ($data['status'] === 'APPROVED') {
            //$solutionId = $request->input('solution_id');
           // $solution = Solution::findOrFail($solutionId);
            $amount = $data['purchase_units'][0]['amount']['value'];

            return [
                'success' => $this->registerSuccessfulPayment($amount, $orderId),
                //'url' => ('cart.successpay');
            ];
        } 
        
        return [
            'success' => false
        ];
    }

    private function registerSuccessfulPayment( $amount, $orderId)
    {
        $userId = $orderId->user_id ?: auth()->id();

        $payment = Payment::create([
            'user_id' => $userId ?: auth()->id(),
            'amount' => $amount, // always in USD
            'paypal_order_id' => $orderId
        ]);

        $payment_id = $payment->id->save();
    }

}

