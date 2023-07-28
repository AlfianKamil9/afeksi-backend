<?php

namespace App\Http\Controllers\Transaksi\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

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
                # code...
            }

        else if ($request->payment_method == 'indomaret') 
            {
                # code...
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
