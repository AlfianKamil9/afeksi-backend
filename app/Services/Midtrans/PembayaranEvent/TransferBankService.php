<?php 

namespace App\Services\Midtrans\PembayaranEvent;

class TransferBankService
{

    public function bank($method, $data) {      // PAYMENT MENGGUNAKAN BNI, BRI, BCA 
        $serverkey = base64_encode(config('midtrans.server_key').':');
        $url = config('midtrans.url');
        $reference = "DEV-";
        $total_amount = 4000 ;
        $body = [
            "payment_type" => "transfer_bank",
            "transaction_details"=> [
                "order_id" => $reference,
                "gross_amount" => $total_amount
                ],
            "bank_transfer" => [
                "bank"=> $method
                ]
            ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => $url,// your preferred url
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($body),
                CURLOPT_HTTPHEADER => [
                    // Set here requred headers
                    "Accept: application/json",
                    "Authorization: Basic ".$serverkey ,
                    "Content-Type: application/json",
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $response =json_decode($response, true);
            
            return $response ?: $err;

    }

    public function mandiri($data) {
        //
    }

    public function permata($data) {
        //
    }
}
