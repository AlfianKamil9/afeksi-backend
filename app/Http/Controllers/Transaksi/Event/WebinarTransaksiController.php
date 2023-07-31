<?php

namespace App\Http\Controllers\Transaksi\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;
use App\Services\Midtrans\PembayaranEvent\CstoreService;


class WebinarTransaksiController extends Controller
{
    public function checkout (Request $request) {
        $validator = Validator::make($request->all(), [
            "payment_method" => 'required',
            "reference" => 'required',
        ]);

// CEK VALIDASI INPUTAN
        if ($validator->fails()) {
            //return redirect()->with('error', $validator->messages());
            return response()->json([
                "message" => $validator->messages()
            ], 402);
        }

// CEK PAYMENT METHOD YANG DIPILIH
        if ($request->payment_method == 'bni' || $request->payment_method == 'bri' || $request->payment_method == 'bca' ) 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                ];
                
                $result = new TransferBankService();
                $res = $result->bank($request->payment_method, $data);

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
                    "bank" => $res["va_numbers"][0]["bank"],
                    "va_transfer" => $res["va_numbers"][0]["va_number"]
                ]);
            }
// CEK PAYMENT METHOD YANG DIPILIH MISAL PERMATA
        else if ($request->payment_method == 'permata') 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                ];
                
                $result = new TransferBankService();
                $res = $result->permata($request->payment_method, $data);

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
                    "message" => $res["status_message"],
                    "bank" => $request->payment_method,
                    "va_transfer" =>  $res["permata_va_number"]
                ]);
            }
// CEK PAYMENT METHOD YANG DIPILIH MISAL MANDIRI
        else if ($request->payment_method == 'mandiri') 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                ];
                
                $result = new TransferBankService();
                $res = $result->mandiri($request->payment_method, $data);

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
                    "bank" => $request->payment_method,
                    "bill_key" =>  $res["bill_key"],
                    "biller_code" => $res["biller_code"]
                ]);
            }

        else if ($request->payment_method == 'alfamart' ) 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data->event->price_event,
                ];
                
                $result = new CstoreService();
                $res = $result-> alfamart($request->payment_method, $data);

              // Konversi respons menjadi array
            $resArray = json_decode($res, true);

            // Periksa apakah konversi berhasil dan $resArray adalah array
            if (is_array($resArray) && isset($resArray["status_code"]) && $resArray["status_code"] != 201) {
                //CEK RESPON ORDER
                if ($resArray["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Your Order Id is not valid"]);
                }

                // SET UPDATE TABLE TRANSAKSI EVENT
                EventTransaction::where('ref_transaction_event', $resArray["order_id"])->update([
                    "payment_method" => $request->payment_method,
                    "total_payment" => $resArray["gross_amount"],
                    "fee_transaction" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $resArray["transaction_time"]
                ]);

                return response()->json([
                    "message" =>  $resArray["status_message"],
                    "store" => $resArray["store"],
                    "payment_code" => $resArray["payment_code"]
                ]);
            }
             else {
                // Tangani jika konversi gagal atau status_code == 201
                return response()->json(["message" => "Unexpected response format or status code is 201"]);
            }; 
            }

        else if ($request->payment_method == 'indomaret') 
            {
                $data1 = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $data = [
                    "reference" => $request->reference,
                    "harga_event" => $data1->event->price_event,
                ];
                
                $result = new CstoreService();
                $res = $result-> indomaret($request->payment_method, $data);

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
        else if ($request->payment_method == 'qris') 
            {
                # code...
            }
        else if ($request->payment_method == 'gopay') 
            {
                # code...
            }
        else if ($request->payment_method == 'shoppePay') 
            {
                # code...
            }
    }
}
