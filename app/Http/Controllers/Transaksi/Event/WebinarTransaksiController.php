<?php

namespace App\Http\Controllers\Transaksi\Event;

use Carbon\Carbon;
use App\Models\bank;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;

use App\Models\EventTransaction;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\CstoreService;
use App\Services\Midtrans\PembayaranEvent\EwalletService;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;
// use \Midtrans\Config;

class WebinarTransaksiController extends Controller
{
    public function pembayaran($ref_transaction_event) {
        $data = EventTransaction::with(
            'user',
            'event')
            ->where('ref_transaction_event', $ref_transaction_event)
            ->firstOrFail();

        $data->event->time_start = Carbon::parse($data->time_start)->format('H:i');
        $data->event->time_finish = Carbon::parse($data->event->time_finish)->format('H:i');
        $data->event->date_event = Carbon::parse($data->event->date_event)->format('d F Y');

        return view('pages.Kegiatan.pembayaran-webinar',[
            'data' => $data
        ]);
    }

    public function checkoutWebinar(Request $request, $ref_transaction_event) {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            "bank" => 'required',
            "ref" => 'required'
        ]);

        if($validate->fails()) {
            return back()->with('message', 'Bank Harus Diisi');
        }

        $bank = bank::where('id', $request->bank)->pluck('bank')->first();
        $this->klasifikasiPaymentMethod($bank, $ref_transaction_event);

        // ambil data
        if ($bank == 'bni' || $bank == 'bri' || $bank == 'bca' || $bank == 'cimb' || $bank == 'permata') {
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va = '<h6 style="text-transform:uppercase;">' . $bank . ' VA = ' . $getData->kode_bayar_1 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        } 

        // mandiri
        else if ($bank == 'mandiri') {
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Bill Key = ' . $getData->kode_bayar_1 . '</h6>
                    <h6 style="text-transform:uppercase;">' . $bank . ' Bill Code = ' . $getData->kode_bayar_2 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";

            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        } 

        // INDOMARET
        else if ($bank == 'indomaret') {
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Kode Pembayaran = ' . $getData->kode_bayar_1 . '</h6>
                    <h6 style="text-transform:uppercase;">Kode Merchant = ' . $getData->kode_bayar_2 . '</h6>
                    ';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";


            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        }

        // ALFAMART
        else if ($bank == 'alfamart') {
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va =   '<h6 style="text-transform:uppercase;">' . $bank . ' Kode Pembayaran = ' . $getData->kode_bayar_1 . '</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>" . $getData->updated_at->addDay(1)->format('l, d M Y') . "</strong> pukul </strong>" . $getData->updated_at->format('H:i') . "</strong>";


            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        }

        // SHOPPERPAY
        else if ($bank == 'shopeepay') {
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va =   '<center><a style="text-transform:uppercase;" href="'.$getData->kode_bayar_1.'" class="btn btn-primary">Bayar Sekarang</a></center>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData->updated_at->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->addMinutes(15)->format('H:i')."</strong>";
            
            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        }

        // GOPAY
        else if ($bank == 'gopay') {
            // <img src="'.$getData->kode_bayar_2.'" width="75px" alt="Kode_Pembayaran">
            $getData =EventTransaction::where('ref_transaction_event', $ref_transaction_event)->first();
            $va =   '<center>
                        <a style="text-transform:uppercase;" href="' . $getData->kode_bayar_1 . '"  class="btn btn-primary">Bayar Sekarang</a>
                    </center>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData->updated_at->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->addMinutes(15)->format('H:i')."</strong>";
            
            Session::flash('popupAfterMentoring', [
                'kode' => $va,
                'pesan' => $pesan 
            ]);
            return Redirect::to('/'.$ref_transaction_event.'/notification-webinar/success');
        }
    }



    
    // KLASIFIKASI PAYMENT METHODE
    public function klasifikasiPaymentMethod($bank, $ref)
    {
        // CEK PAYMENT METHOD YANG DIPILIH
        if ($bank == 'bni' || $bank == 'bri' || $bank == 'bca' ||  $bank == 'cimb'){
            $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $ref)->first();
            $data = [
                "reference" => $ref,
                "harga_event" => $data->event->price_event,
                "nama"  => $data->user->nama,
                "email"  => $data->user->email,
                "no_tlpn" => $data->user->no_whatsapp
            ];

            $result = new TransferBankService();
            $res = $result->bank($bank, $data);
            // dd($res);

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
                "kode_bayar_1" => $res["va_numbers"][0]["va_number"],
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
                "kode_bayar_1" => $res["permata_va_number"],
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
                "kode_bayar_1" => $res["bill_key"],
                "kode_bayar_2" => $res["biller_code"],
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
                "kode_bayar_1" => $res["payment_code"],
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
                    "kode_bayar_1" => $res["payment_code"],
                    "kode_bayar_2" => $res["merchant_id"],
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
            $res = $result->qris($bank, $data);
            return response($res);

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
                "kode_bayar_1" => $res["actions"][0]['url'],
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
                "kode_bayar_1" => $res["actions"][1]['url'],
                "kode_bayar_2" => $res["actions"][0]['url'],
                "fee_transaction" => 4000,
                "status" => "PENDING",
                "updated_at" => $res["transaction_time"]
            ]);
           // dd($res);
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
            //return response($res, 201);
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
                "kode_bayar_1" => $res["actions"][0]['url'],
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
