<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Pecah order id agar bisa diterima oleh database
        $order = explode('-', $notification->order_id);

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($order_id);

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        } elseif ($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
        } elseif ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        } elseif ($status == 'deny') {
            $transaction->transaction_status = 'CANCELLED';
        } elseif ($status == 'expire') {
            $transaction->transaction_status = 'EXPIRED';
        } elseif ($status == 'cancel') {
            $transaction->transaction_status = 'CANCELLED';
        }

        // simpan transaksi
        $transaction->save();

        // Kirim Email
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'accept') {
                Mail::to($transaction->users->email)->send(new TransactionSuccess($transaction));
            } elseif ($status == 'settlement') {
                Mail::to($transaction->users->email)->send(new TransactionSuccess($transaction));
            } elseif ($status == 'success') {
                Mail::to($transaction->users->email)->send(new TransactionSuccess($transaction));
            } elseif ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment not settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans notification success'
                ]
            ]);
        }
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.success');
    }

    public function unfinishRedirect(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.failed');
    }
}
