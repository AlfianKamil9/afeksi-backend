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

        $id = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->pluck('id')->first();
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
            'expired_date' => $request->tgl_konsultasi,
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
        $getData = DetailPembayaran::where('pembayaran_layanan_id', $id)->first();
        Alert::alert()->html('<img src="/assets/img/image-notification.png" height="150px" />',"Terima Kasih <br> ".$getData->kode_bayar_1)->persistent(true,false)->showConfirmButton('Kembali', '#3085d6');
        return view('pages.popup-informasi');
    }

    // KLASIFIKASI PEMBAYARAN
    public function klasifikasiPaymentMethod ($bank, $ref) {

        if ($bank == 'bni' || $bank == 'bri' ||$bank == 'bca' ||$bank == 'cimb' ) {
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
    }
}
