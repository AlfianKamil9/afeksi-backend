<?php

namespace App\Services\Midtrans\PembayaranEvent;

use \Midtrans\Config;

class EwalletService
{
    public function gopay($data, $method)
    {
        $serverkey = config('midtrans.midtrans.server_key');
        // dd($serverkey);
        $serverBase64 = base64_encode($serverkey . ':');
        // dd($serverBase64);
        $url = config('midtrans.midtrans.url');
        // dd($url);
        $reference = $data['reference'];
        // dd($reference);
        $total_amount = $data["harga_event"] + 4000;
        $body = [
            "payment_type" => $method,
            "transaction_details" => [
                "order_id"      => $reference,
                "gross_amount"  => $total_amount
            ],
            "customer_details"  => [
                "email"  => "noreply@example.com",
                "first_name" => "budi",
                "last_name" => "utomo",
                "phone" => "+6281 1234 1234"
            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // your preferred url
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
                "Authorization: Basic " . $serverBase64,
                "Content-type: application/json",
            ],
        ));

        $response = curl_exec($curl);
        //dd($response);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response ?: $err;
    }

    public function qris($data, $method)
    {
        $serverkey = config('midtrans.midtrans.server_key');
        $serverBase64 = base64_encode($serverkey . ':');
        $url = config('midtrans.midtrans.url');
        $reference = $data['reference'];
        $total_amount = $data["harga_event"] + 4000;
        $body = [
            "payment_type" => $method,
            "transaction_details" => [
                "order_id"      => $reference,
                "gross_amount"  => $total_amount
            ],
            "customer_details"  => [
                "email"  => "noreply@example.com",
                "first_name" => "budi",
                "last_name" => "utomo",
                "phone" => "+6281 1234 1234"
            ],
            "qris" => [
                "acquirer" => "gopay"
            ]
        ];
        // dd($body);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // your preferred url
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                // Set here requred headers
                "accept: application/json",
                "authorization: Basic " . $serverBase64,
                "content-type: application/json",
            ],
        ));

        $response = curl_exec($curl);
        //dd($response);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response ?: $err;
    }

    public function shopeePay($data, $method)
    {
        $serverkey = config('midtrans.midtrans.server_key');
        $serverBase64 = base64_encode($serverkey . ':');
        $url = config('midtrans.midtrans.url');
        $reference = $data['reference'];
        $total_amount = $data["harga_event"] + 4000;
        $body = [
            "payment_type" => $method,
            "transaction_details" => [
                "order_id"      => $reference,
                "gross_amount"  => $total_amount
            ],
            "item_details" => [
                [
                    "id" => $data['event_id'],
                    "price" => $total_amount,
                    "quantity" => 1,
                    "name" => $data['title_event']
                ]
            ],
            "customer_details"  => [
                "email"  => "noreply@example.com",
                "first_name" => "budi",
                "last_name" => "utomo",
                "phone" => "+6281 1234 1234"
            ],
            "shopeepay" => [
                "callback_url" => "https://midtrans.com/"
            ]
        ];
        // dd($body);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url, // your preferred url
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                // Set here requred headers
                "accept: application/json",
                "authorization: Basic " . $serverBase64,
                "content-type: application/json",
            ],
        ));

        $response = curl_exec($curl);
        //dd($response);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response ?: $err;
    }
}
