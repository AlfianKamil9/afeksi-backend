<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembayaranLayanan;
use RealRashid\SweetAlert\Facades\Alert;

class NotifikasiMentoring extends Controller
{
    public function index($ref_transaction_layanan) {
        
        //$cekSlug = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->where('status', 'PENDING')->firstOrFail();
        if (session()->has('popupAfterMentoring')) {
            Alert::alert()->html(session('popupAfterMentoring')['kode'], session('popupAfterMentoring')['pesan'])->persistent(true,false);
        }

        // if (!$cekSlug) {
        //     return redirect('/error');
        // }
        return view('pages.popup-informasi');
    }
}
