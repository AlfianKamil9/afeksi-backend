<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembayaranLayanan;
use RealRashid\SweetAlert\Facades\Alert;

class NotifikasiMentoring extends Controller
{
    public function index($ref_transaction_layanan) {
        
        if (session()->has('point')) {
            Alert::alert()->html(session('kode'), session('pesan'))->persistent(true,false);
        }

        $cekSlug = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->where('status', 'PENDING')->firstOrFail();
        if (!$cekSlug) {
            return redirect('/error');
        }
        return view('pages.popup-informasi');
    }
}
