<?php

namespace App\Http\Controllers\Transaksi\Layanan;

use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\PembayaranLayanan;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\PaketLayananNonProfessional;
use App\Http\Controllers\Transaksi\PaymentMethod;

class MentoringTransaksiController extends Controller
{
    public function layananNonProfesional($ref_transaction_layanan) {
        $data = PembayaranLayanan::with(
            'user', 
            'paket_non_professionals.layanan_non_professionals', 
            'psikolog',
            'detail_pembayarans')->where('ref_transaction_layanan', $ref_transaction_layanan)->firstOrFail();
        
        return view('pages.pembayaran', compact('data'));
    }

    
    // Checkout
    public function checkoutLayananNonProfessional(Request $request) {
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

        $set = new PaymentMethod();
        $res = $set->clasificaation_payment($request->bank, $request->ref);

        Alert::alert()->html('<img src="/assets/img/image-notification.png" height="150px" />',"Terima Kasih <br> Formulir pendaftaran Anda berhasil dikirim")->persistent(true,false)->showConfirmButton('Kembali', '#3085d6');
        return redirect('/popup-informasi');
    }
}
