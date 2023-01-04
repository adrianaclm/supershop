<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\User;

class PaymentPController extends Controller
{
    public function create(Solution $solution){

        // if its already paid, go to the results page

        if ($solution->alreadyPaid()) {
            return redirect($solution->getResultsLink());
        }

        $user = $solution->user;

        $country = $solution->getCountry();
        // dd($country);

        $usdPrice = $country->getUsdPrice();

        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $email = $user->email;

        if ($solution->discount)
            $discountedUsdAmount = $solution->getAmountPay();
        else   
            $discountedUsdAmount = null;

        return view('payments.create');

    }

    public function process($orderId, Request $request){
        $accessToken = $this->getAccessToken();

        $requestUrl = "/v2/checkout/orders/$orderId/capture";

        $response = $this->client->request('POST', $requestUrl, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $accessToken"
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] === 'COMPLETED') {
            // Ubicar la solución del usuario
            $solutionId = $request->input('solution_id');
            $solution = Solution::findOrFail($solutionId);
        
            // Obtener el paymentId y el monto pagado, de $data
            $payPalPaymentId = $data['purchase_units'][0]['payments']['captures'][0]['id'];
            $amount = $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
        
            // Registrar un pago exitoso en la BD
            $payment = $this->registerSuccessfulPayment($solution, $amount, $payPalPaymentId);
        
            // Dar una respuesta de error si el pago no se pudo registrar
            if (!$payment) {
                return $this->responseFailure();
            }
        
            // Dar una respuesta de éxito si todo salió bien
            return [
                'success' => true,
                'url' => $solution->getResultsLink(),
                'payment_id' => $payment->id,
                'amount' => $amount
            ];
        }
    }

   
}