<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\EventTransaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HandleAfterPayment extends Controller
{
     /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $payload = $request->all();

        Log::info('from-midtrans', [
            'payload' => $payload
        ]);

        $orderID = $payload['order_id'];
        $statusCode = $payload['status_code'];
        $grossAmount = $payload['gross_amount'];

        $reqSignature = $payload['signature_key'];

        $signature = hash('sha512', $orderID.$statusCode.$grossAmount.config('midtrans.midtrans.server_key'));

        if ($signature != $reqSignature) {
            return response()->json([
                "message" => "Invalid Signature"], 401);
        }

        $transactionStatus = $payload['transaction_status'];

        $order = EventTransaction::find($orderID);
        if (!$order) {
            return response()->json(["message" => "Invalid Order"], 400);        
        }

        if ($transactionStatus == 'settlement') {
            $order->status = 'PAID';
            $order->save();
        } else if ($transactionStatus == 'expire') {
            $order->status = 'EXPIRE';
            $order->save();
        }

        return response()->json(["message" => 'success'], 200);
    }

}
