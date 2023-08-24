<?php

namespace App\Http\Controllers\Transaksi\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

use App\Services\Midtrans\PembayaranEvent\CstoreService;
use App\Services\Midtrans\PembayaranEvent\EwalletService;
// use \Midtrans\Config;

class WebinarTransaksiController extends Controller
{
    public function checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "payment_method" => 'required',
            "reference" => 'required',
        ]);
        //dd($request->all());

        // CEK VALIDASI INPUTAN
        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->messages()
            ], 402);
        }


// CEK PAYMENT METHOD YANG DIPILIH
        if ($request->payment_method == 'bni' || $request->payment_method == 'bri' || $request->payment_method == 'bca' ||  $request->payment_method == 'cimb') 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
                
                // $result = new TransferBankService();
                // $res = $result->bank($request->payment_method, $data);
                
                $result = new TransferBankService();
                $res = $result->bank($request->payment_method, $data);
                dd($data);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" =>  $res["status_message"],
                "bank" => $res["va_numbers"][0]["bank"],
                "va_transfer" => $res["va_numbers"][0]["va_number"]
            ]);
        }


        // CEK PAYMENT METHOD YANG DIPILIH MISAL PERMATA
        else if ($request->payment_method == 'permata') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
            $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];

            $result = new TransferBankService();
            $res = $result->permata($request->payment_method, $data);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" => $res["status_message"],
                "bank" => $request->payment_method,
                "va_transfer" =>  $res["permata_va_number"]
            ]);
        }


        // CEK PAYMENT METHOD YANG DIPILIH MISAL MANDIRI
        else if ($request->payment_method == 'mandiri') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
            $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];

            $result = new TransferBankService();
            $res = $result->mandiri($request->payment_method, $data);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);

            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" =>  $res["status_message"],
                "bank" => $request->payment_method,
                "bill_key" =>  $res["bill_key"],
                "biller_code" => $res["biller_code"]
            ]);
        }
        
        // PAYMENT ALFAMART
        else if ($request->payment_method == 'alfamart' ) 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp,
                    "pesan" => "Pembayaran Webinar ".$data->event->title_event
                ];
                $result = new CstoreService();
                $res = $result->alfamart($request->payment_method, $data);
              // Konversi respons menjadi array

             //CEK KODE RESPON
            if ($res["status_code"] != 201 ) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);          
                return response()->json([
                    "message" =>  $res["status_message"],
                    "store" => $res["store"],
                    "payment_code" => $res["payment_code"]
                ]);
        }

        //PAYMENT INDOMARET
        else if ($request->payment_method == 'indomaret') 
            {
                $data = EventTransaction::with('event','user')->where('ref_transaction_event', $request->reference)->first();
                // dd($data);    
                $data = [
                        "reference" => $request->reference,
                        "harga_event" => $data->event->price_event,
                        "nama"  => $data->user->nama,
                        "email"  => $data->user->email,
                        "no_tlpn" => $data->user->no_whatsapp,
                        "pesan" => "Pembayaran Webinar ".$data->event->title_event
                    ];
                    // dd($data);
                    $result = new CstoreService();
                    $res = $result-> indomaret($request->payment_method, $data);

                // Konversi respons menjadi array

                //CEK KODE RESPON
                if ($res["status_code"] != 201 ) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
                }
                // SET UPDATE TABLE TRANSAKSI EVENT
                EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                    "payment_method" => $request->payment_method,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaction" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
                ]);

                    return response()->json([
                        "message" =>  $res["status_message"],
                        "store" => $res["store"],
                        "payment_code" => $res["payment_code"]
                    ]);
            }


        
        else if ($request->payment_method == 'qris') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
            // dd($request->payment_method);
            $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];
            // dd($data);

            $result = new EwalletService();
            $res = $result->qris($data, $request->payment_method);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" =>  $res["status_message"],
                "actions" => $res['actions']
            ]);

        } 
        
        // PAYMENT GOPAY
        else if ($request->payment_method == 'gopay') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
            // dd($data);
            $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];
            // dd($data);

            $result = new EwalletService();
            $res = $result->gopay($data, $request->payment_method);

            // CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            dd($res);
            return response()->json([
                "message" =>  $res["status_message"],
                "actions" => $res['actions']
            ]);

            
        } 
        
        // PAYMENT SHOPPEPAY
        else if ($request->payment_method == 'shopeepay') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
            $data = [
                "reference" => $request->reference,
                "harga_event" => $data->event->price_event,
                "nama"  => $data->user->nama,
                "email"  => $data->user->email,
                "no_tlpn" => $data->user->no_whatsapp,
                "event_id"  => $data->event->id,
                "title_event" => $data->event->title_event
            ];

            $result = new EwalletService();
            $res = $result->shopeePay($data, $request->payment_method);

            //CEK KODE RESPON
            if ($res["status_code"] != 201) {
                return response()->json($res);
            }
            //CEK RESPON ORDER
            if ($res["order_id"] != $data["reference"]) {
                return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
            }
            // SET UPDATE TABLE TRANSAKSI EVENT
            EventTransaction::where('ref_transaction_event', $res["order_id"])->update([
                "payment_method" => $request->payment_method,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" =>  $res["status_message"],
                "actions" => $res['actions']
            ]);
        }
    }
}
