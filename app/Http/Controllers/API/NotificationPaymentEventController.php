<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class NotificationPaymentEventController extends Controller
{
    // /**
    //  * Handle the incoming request.
    //  */
    // public function __invoke(Request $request)
    // {
    //     //
    // }

    public function callback(Request $request)
    {
        //set konfigurasi midtrans
        Config::$serverKey = 'SB-Mid-server-jCrOnrL8Qbl30LMOknfYOxtJ';
        config::$isProduction = false;
        config::$isSanitized = true;
        config::$is3ds = true;
        // config::$isProduction = config('midtrans.isProduction');
        // config::$isSanitized = config('midtrans.isSanitized');
        // config::$is3ds = config('midtrans.is3ds');

        //buat instance midtrans notification
        $notification = new Notification();
        
        //pecah order id
        $order = explode('-',  $notification->order_id);

        //assign ke variabel untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        // $order_id = 'AHAYSHOP-' . $notification->order_id;
        $order_id = $order[1];

        //cari transaksi berdasarkan id
        $transaction = EventTransaction::where('ref_transaction_event', $notification->order_id)->firstOrFail();
        //handle notification status midtrans
        if($status == 'capture'){
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status = 'CHALLENGE';
                }else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        else if($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        }
        else if($status == 'pending') {
            $transaction->status = 'PENDING';
        }
        else if($status == 'deny') {
            $transaction->status = 'FAILED';
        }
        else if($status == 'expire') {
            $transaction->status = 'EXPIRED';
        }
        else if($status == 'cancel') {
            $transaction->status = 'FAILED';
        }

        //simpan transaksi
        $transaction->update([
            'status' => $transaction->status
        ]);

        //mengirim email
        //  if ($transaction) {
        //      if ($status == 'capture' && $fraud == 'accept') {
        //          Mail::to($transaction->user)->send(
        //              new TransactionSuccess($transaction)
        //          );
        //      }
        //  }
        //  else if ($transaction) {
        //     if ($status == 'settlement') {
        //         Mail::to($transaction->user)->send(
        //             new TransactionSuccess($transaction)
        //         );
        //     }
        // }
        // else if ($transaction) {
        //     if ($status == 'success') {
        //         Mail::to($transaction->user)->send(
        //             new TransactionSuccess($transaction)
        //         );
        //     }
        // }
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else if ($transaction) {
                if ($status == 'capture' && $fraud == 'challenge') {
                    return response()->json([
                        'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                        ]
                    ]);
                }
        }
        else {
                return response()->json([
                    'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }
        }
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.detail-campaign');
    }

    public function unfinishRedirect(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.error');
    }
}