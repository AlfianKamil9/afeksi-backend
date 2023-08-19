<?php 

namespace App\Services\Midtrans\PembayaranEvent;

class CstoreService
{
    public function alfamart($method,$data) {
        $serverkey = config('midtrans.midtrans.server_key');
        $serverBase64 = base64_encode($serverkey.':');
        $url = config('midtrans.midtrans.url');
        $reference = $data['reference'];
        $total_amount = $data["harga_event"] + 4000 ;
        $body =[
            "payment_type"=> "cstore",
            "transaction_details"=> [
                "order_id"=> $reference,
                "gross_amount"=> $total_amount,
            ],
            "cstore" => [
              "store" => $method,
              "alfamart_free_text_1"=> $data['pesan'],
            ],
            "customer_details"  => [
                "email"  => $data['email'],
                "first_name" => $data['nama'],
                "phone"=> $data['no_tlpn']
            ]
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($body),
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Basic ".$serverBase64 ,
                    "content-type: application/json",
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $response =json_decode($response, true);
            return $response ?: $err;
    }

    public function indomaret($method,$data) {
        //
        $serverkey = config('midtrans.midtrans.server_key');
        // dd($serverkey);
        $serverBase64 = base64_encode($serverkey.':');
        // dd($serverBase64);
        $url = config('midtrans.midtrans.url');
        // dd($url);
        
        $reference = $data['reference'];
        $total_amount = $data["harga_event"] + 4000 ;
        $dataCStore =[
            "payment_type"=> "cstore",
            "transaction_details"=> [
                "order_id"=> $reference,
                "gross_amount"=> $total_amount,
            ],
            "cstore" => [
              "store" => $method,
            ],
            "customer_details"  => [
                "email"  => $data['email'],
                "first_name" => $data['nama'],
                "phone"=> $data['no_tlpn'],
            ]
          
            ];
            // dd($dataCStore);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($dataCStore),
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Basic ".$serverBase64 ,
                    "content-type: application/json",
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $response =json_decode($response, true);
            return $response ?: $err;
    }

}
