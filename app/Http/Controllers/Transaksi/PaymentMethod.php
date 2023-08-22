<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Models\EventTransaction;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use App\Models\DetailPembayaran;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\CstoreService;
use App\Services\Midtrans\PembayaranEvent\EwalletService;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

class PaymentMethod extends Controller
{
    public function clasificaation_payment ($bank, $ref) {

// CEK PAYMENT METHOD YANG DIPILIH
        if ($bank == 1 ) //BCA
            {
                $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
                $bank = "bca";
                $result = new TransferBankService();
                $res = $result->bank($bank, $data);

                //CEK KODE RESPON
                if ($res["status_code"] != 201) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
                }
                // SET UPDATE TABLE TRANSAKSI EVENT
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    // "status" => "PENDING",
                    // "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["va_numbers"][0]["va_number"]
                ]);
                
                $responData =[
                    "message" =>  $res["status_message"],
                    "bank" => $res["va_numbers"][0]["bank"],
                    "va_transfer" => $res["va_numbers"][0]["va_number"]
                ];

                return $responData;
        }

        if ($bank == 2 ) //BRI
            {
                $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
                $bank = "bri";
                $result = new TransferBankService();
                $res = $result->bank($bank, $data);

                //CEK KODE RESPON
                if ($res["status_code"] != 201) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
                }
                // SET UPDATE TABLE TRANSAKSI EVENT
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    // "status" => "PENDING",
                    // "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["va_numbers"][0]["va_number"]
                ]);
                
                $responData =[
                    "message" =>  $res["status_message"],
                    "bank" => $res["va_numbers"][0]["bank"],
                    "va_transfer" => $res["va_numbers"][0]["va_number"]
                ];

                return $responData;
        }

        if ($bank == 3 ) //BNI
            {
                $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
                $bank = "bni";
                $result = new TransferBankService();
                $res = $result->bank($bank, $data);

                //CEK KODE RESPON
                if ($res["status_code"] != 201) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
                }
                // SET UPDATE TABLE TRANSAKSI EVENT
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    // "status" => "PENDING",
                    // "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["va_numbers"][0]["va_number"]
                ]);
                
                $responData =[
                    "message" =>  $res["status_message"],
                    "bank" => $res["va_numbers"][0]["bank"],
                    "va_transfer" => $res["va_numbers"][0]["va_number"]
                ];

                return $responData;
        }

        if ($bank == 6 ) //CIMB 
            {
                $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
                $bank = "bca";
                $result = new TransferBankService();
                $res = $result->bank($bank, $data);

                //CEK KODE RESPON
                if ($res["status_code"] != 201) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Your Order Id and not valid"]);
                }
                // SET UPDATE TABLE TRANSAKSI EVENT
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    // "status" => "PENDING",
                    // "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["va_numbers"][0]["va_number"]
                ]);
                
                $responData =[
                    "message" =>  $res["status_message"],
                    "bank" => $res["va_numbers"][0]["bank"],
                    "va_transfer" => $res["va_numbers"][0]["va_number"]
                ];

                return $responData;
        }


        // CEK PAYMENT METHOD YANG DIPILIH MISAL PERMATA
        else if ($bank == 'permata') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            $data = [
                    "reference" => $ref,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];

            $result = new TransferBankService();
            $res = $result->permata($bank, $data);

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
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
            return response()->json([
                "message" => $res["status_message"],
                "bank" => $bank,
                "va_transfer" =>  $res["permata_va_number"]
            ]);
        }


        // CEK PAYMENT METHOD YANG DIPILIH MISAL MANDIRI
        else if ($bank == 'mandiri') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            $data = [
                    "reference" => $ref,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];

            $result = new TransferBankService();
            $res = $result->mandiri($bank, $data);

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
                "payment_method" => $bank,
                "total_payment" => $res["gross_amount"],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);

            return response()->json([
                "message" =>  $res["status_message"],
                "bank" => $bank,
                "bill_key" =>  $res["bill_key"],
                "biller_code" => $res["biller_code"]
            ]);
        }
        
        // PAYMENT ALFAMART
        else if ($bank == 'alfamart' ) 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp,
                    "pesan" => "Pembayaran Webinar ".$data->event->title_event
                ];
                $result = new CstoreService();
                $res = $result->alfamart($bank, $data);
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
                "payment_method" => $bank,
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
        else if ($bank == 'indomaret') 
            {
                $data = EventTransaction::with('event','user')->where('ref_transaction_event', $ref)->first();
                // dd($data);    
                $data = [
                        "reference" => $ref,
                        "harga_event" => $data->event->price_event,
                        "nama"  => $data->user->nama,
                        "email"  => $data->user->email,
                        "no_tlpn" => $data->user->no_whatsapp,
                        "pesan" => "Pembayaran Webinar ".$data->event->title_event
                    ];
                    // dd($data);
                    $result = new CstoreService();
                    $res = $result-> indomaret($bank, $data);

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
                    "payment_method" => $bank,
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


        
        else if ($bank == 'qris') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            // dd($bank);
            $data = [
                    "reference" => $ref,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];
            // dd($data);

            $result = new EwalletService();
            $res = $result->qris($data, $bank);

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
                "payment_method" => $bank,
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
        else if ($bank == 'gopay') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            // dd($data);
            $data = [
                    "reference" => $ref,
                    "harga_event" => $data->event->price_event,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
            ];
            // dd($data);

            $result = new EwalletService();
            $res = $result->gopay($data, $bank);

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
                "payment_method" => $bank,
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
        else if ($bank == 'shopeepay') {
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            $data = [
                "reference" => $ref,
                "harga_event" => $data->event->price_event,
                "nama"  => $data->user->nama,
                "email"  => $data->user->email,
                "no_tlpn" => $data->user->no_whatsapp,
                "event_id"  => $data->event->id,
                "title_event" => $data->event->title_event
            ];

            $result = new EwalletService();
            $res = $result->shopeePay($data, $bank);

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
                "payment_method" => $bank,
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
