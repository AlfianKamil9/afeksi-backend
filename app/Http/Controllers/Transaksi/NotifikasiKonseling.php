<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembayaranLayanan;
use RealRashid\SweetAlert\Facades\Alert;

class NotifikasiKonseling extends Controller
{
    public function index($ref_transaction_layanan)
    {

        if (session()->has('popupAfterKonseling')) {
            Alert::alert()->html(session('kode'), session('pesan'))->persistent(true, false);
            $cekSlug = PembayaranLayanan::where('ref_transaction_layanan', $ref_transaction_layanan)->where('status', 'UNPAID')->first();
            // dd($cekSlug);
        }
        return view('pages.popup-informasi');

        if (!$cekSlug) {
            return redirect('/error');
        }
    }
}
