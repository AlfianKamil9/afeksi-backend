<?php

namespace App\Http\Controllers\Transaksi\Layanan;

use Carbon\Carbon;
use App\Models\bank;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\PaketLayananNonProfessional;
use App\Http\Controllers\Transaksi\PaymentMethod;
use App\Services\Midtrans\PembayaranEvent\CstoreService;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

class MentoringTransaksiController extends Controller
{
    // Menampilkan Halaman Data Diri 
    public function showFormDataDiri() {
        return view('pages.LayananMentoring.data-diri');
    }

    // Input data diri dan masukkan ke tabel user bagi fielad yang masih kosong dan ke tabel detailTransaksi  layanan
    public function submitFormDataDiri (Request $request, $ref_transaction_layanan) {
        $request->validate([
            "namaLengkap" => "required",
            "jenisKelamin" => "required",
            "no_whatsapp" => "required",
            "umur" => "required|numeric",
            "tgl_konsultasi" => "required",
            "jam_konsultasi" => "required",
            "detail_masalah" => "required",
        ]);

        $id = PembayaranLayanan::where("ref_transaction_layanan", $ref_transaction_layanan)->pluck('id')->first();
        User::where('id', auth()->user()->id)->update([
            'umur' => $request->umur,
            'jenisKelamin' => $request->jenisKelamin,
            'no_whatsapp' => $request->no_whatsapp
            
        ]);
        DetailPembayaran::create([
            'pembayaran_layanan_id'=> $id,
            'tgl_konsultasi' => $request->tgl_konsultasi,
            'jam_konsultasi' => $request->jam_konsultasi,
            'detail_masalah' => $request->detail_masalah,
        ]);

        return redirect('/slug-mentoring-yg-dipilih/'.$ref_transaction_layanan.'/pembayaran');
    }

    // Menampilkan  Halaman Checkout 
    public function layananNonProfesional($ref_transaction_layanan) {
        $data = PembayaranLayanan::with(
            'user', 
            'paket_non_professionals.layanan_non_professionals', 
            'psikolog',
            'detail_pembayarans')->where('ref_transaction_layanan', $ref_transaction_layanan)->firstOrFail();
        
        return view('pages.LayananMentoring.pembayaran', compact('data'));
    }

    
    // Checkout
    public function checkoutLayananNonProfessional(Request $request, $ref_transaction_layanan ) {
        $id = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->pluck('id')->first();
        if (isset($request->btnBatalVoucher)) {
            session()->forget('apply');
            return back();
        }
        else if (isset($request->btnApplyVoucher)) {
            if (isset($request->input_code)) {
                $now = Carbon::now();
                $kode = Voucher::where('kode', $request->input_code)->where('expired_date', '>=', $now )->first();
                    if (!$kode) {
                        return back()->with('error', 'Code Voucher is Invalid');
                    }              
                session()->put('apply', [
                    'kode' => $kode->kode,
                    'diskon' => $kode->jumlah_diskon,
                    'pesan' => "Berhasil Menerapkan Voucher",
                    'bank' => $request->bank
                ]);
                return back();
            }
            return back()->with('error', 'Code Voucher is Null');
        }

        $validate = Validator::make($request->all(), [
            "bank" => 'required',
            "ref" => 'required'
        ]);
        if($validate->fails()) {
            return back()->with('message', 'Bank Harus Diisi');
        }
        $bank = bank::where('id', $request->bank)->pluck('bank')->first();
        $this->klasifikasiPaymentMethod($bank, $ref_transaction_layanan);

        //ambil data
        if ($bank == 'bni' || $bank == 'bri' || $bank == 'bca' || $bank == 'cimb' || $bank == 'permata' ) {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va = '<h6 style="text-transform:uppercase;">'.$bank.' VA = '.$getData->kode_bayar_1.'</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData2->updated_at->addDay(1)->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->format('H:i')."</strong>";

            return redirect('/'.$ref_transaction_layanan.'/notification/success')
            ->with([
                'point' => true,
                'kode' => $va,
                'pesan' => $pesan 
            ]);
        } 
        // ----------###--------------
        else if ($bank == 'mandiri') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">'.$bank.' Bill Key = '.$getData->kode_bayar_1.'</h6>
                    <h6 style="text-transform:uppercase;">'.$bank.' Bill Code = '.$getData->kode_bayar_2.'</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData2->updated_at->addDay(1)->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->format('H:i')."</strong>";

            return redirect('/'.$ref_transaction_layanan.'/notification/success')
            ->with([
                'point' => true,
                'kode' => $va,
                'pesan' => $pesan 
            ]);
        } 
        // ---------###---------------
        else if ($bank == 'indomaret') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">'.$bank.' Kode Pembayaran = '.$getData->kode_bayar_1.'</h6>
                    <h6 style="text-transform:uppercase;">Kode Merchant = '.$getData->kode_bayar_2.'</h6>
                    ';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData2->updated_at->addDay(1)->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->format('H:i')."</strong>";

            return redirect('/'.$ref_transaction_layanan.'/notification/success')
            ->with([
                'point' => true,
                'kode' => $va,
                'pesan' => $pesan 
            ]);
        }
        // ---------######--------------
        else if ($bank == 'alfamart') {
            $getData = DetailPembayaran::where('pembayaran_layanan_id', $id)->first();
            $getData2 = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->first();
            $va =   '<h6 style="text-transform:uppercase;">'.$bank.' Kode Pembayaran = '.$getData->kode_bayar_1.'</h6>';
            $pesan = "Silahkan Lengkapi Pembayaran Sebelum <br><strong>".$getData2->updated_at->addDay(1)->format('l, d M Y')."</strong> pukul </strong>".$getData->updated_at->format('H:i')."</strong>";

            return redirect('/'.$ref_transaction_layanan.'/notification/success')
            ->with([
                'point' => true,
                'kode' => $va,
                'pesan' => $pesan 
            ]);
        }


    }

    // KLASIFIKASI PEMBAYARAN
    public function klasifikasiPaymentMethod ($bank, $ref) {
        $tabelPembayaran = PembayaranLayanan::where('ref_transaction_layanan', $ref)->pluck('id')->first();

        if ($bank == 'bni' || $bank == 'bri' ||$bank == 'bca' || $bank == 'cimb' ) {
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp
                ];
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
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
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

        else if ($bank == "mandiri") {
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
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
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["bill_key"],
                    "kode_bayar_2" => $res["biller_code"]
                ]);
                $expired = Carbon::now()->addDay(1)->format('Y-m-d');
                $responData = [
                    "message" =>  $res["status_message"],
                    "bill_key" =>  $res["bill_key"],
                    "biller_code" => $res["biller_code"]
                ];
                return $responData;

        }

        else if ($bank == "permata") {
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
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
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["permata_va_number"],
                ]);
                $responData = [
                    "message" => $res["status_message"],
                    "bank" => $bank,
                    "va_transfer" =>  $res["permata_va_number"]
                ];
                return $responData;

        }
        else if ($bank == "indomaret") {
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp,
                    "pesan" => "Pembayaran Layanan Mentoring Afeksi"
                ];
                $result = new CstoreService();
                $res = $result-> indomaret($bank, $data);

                //CEK KODE RESPON
                if ($res["status_code"] != 201 ) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
                }
                // insert db
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["payment_code"],
                    "kode_bayar_2" => $res["merchant_id"],
                ]);
                $responData = [
                    "message" =>  $res["status_message"],
                    "store" => $res["store"],
                    "payment_code" => $res["payment_code"]
                ];
                return $responData;
        }
        else if($bank == "alfamart") {
                $data = PembayaranLayanan::with('user', 'paket_non_professionals.layanan_non_professionals', 'psikolog', 'detail_pembayarans')->where('ref_transaction_layanan', $ref)->first();
                $data = [
                    "reference" => $ref,
                    "harga_event" => $data->paket_non_professionals->harga,
                    "nama"  => $data->user->nama,
                    "email"  => $data->user->email,
                    "no_tlpn" => $data->user->no_whatsapp,
                    "pesan" => "Pembayaran Layanan Mentoring Afeksi"
                ];
                $result = new CstoreService();
                $res = $result-> alfamart($bank, $data);
                //CEK KODE RESPON
                if ($res["status_code"] != 201 ) {
                    return response()->json($res);
                }
                //CEK RESPON ORDER
                if ($res["order_id"] != $data["reference"]) {
                    return response()->json(["message" => "Sorry, Yor Order Id and not valid"]);
                }
                // insert db
                PembayaranLayanan::where('ref_transaction_layanan', $res["order_id"])->update([
                    "payment_method" => $bank,
                    "total_payment" => $res["gross_amount"],
                    "fee_transaksi" => 4000,
                    "status" => "PENDING",
                    "updated_at" => $res["transaction_time"]
                ]);
                DetailPembayaran::where('pembayaran_layanan_id', $tabelPembayaran)->update([
                    "kode_bayar_1" => $res["payment_code"],
                ]);
                $responData = [
                    "message" =>  $res["status_message"],
                    "store" => $res["store"],
                    "payment_code" => $res["payment_code"]
                ];
                return $responData;
        }
        
        else if ($bank == "gopay") {
            # code...
        } 

        else if ($bank == "shoppepay") {
            # code...
        }
    }
}
