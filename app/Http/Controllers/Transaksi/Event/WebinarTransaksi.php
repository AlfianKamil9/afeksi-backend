<?php

namespace App\Http\Controllers\Transaksi\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Support\Facades\Validator;
use App\Services\Midtrans\PembayaranEvent\TransferBankService;

class WebinarTransaksi extends Controller
{
    public function checkout (Request $request) {
        $validator = Validator::make($request->all(), [

        ]);

// CEK VALIDASI INPUTAN
        if ($validator->fails()) {
            return redirect()->with('error', $validator->messages());
        }

// CEK PAYMENT METHOD YANG DIPILIH
        if ($request->payment_method == 'bni' || $request->payment_method == 'bri' || $request->payment_method == 'bca' ) 
            {
                $data = EventTransaction::with('event', 'user')->where('ref_transaction_event', $request->reference)->first();
                $result = new TransferBankService();
                $res = $result->bank($request->payment_method, $data);
            }

        else if ($request->payment_method == 'alfamart' ) 
            {
                # code...
            }

        else if ($request->payment_method == 'indomaret') 
            {
                # code...
            }
    }
}
