<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Mail\TransactionSuccess;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $transaction = Transaction::with('details', 'travel_packages', 'users')->find($id);

        return view('pages.checkout', compact('transaction'));
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::find($id);

        $transaction = Transaction::create([
            'travel_package_id' => $id,
            'user_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART',
        ]);

        $transaction_detail = TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5),
        ]);

        return redirect()->route('checkout', $transaction->id)->with('success', 'Data Transaksi Berhasil Dibuat');
    }

    public function create(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with('travel_packages')->find($id);

        if($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }
        $transaction->transaction_total += $transaction->travel_packages->price;

        $transaction->save();

        return redirect()->route('checkout', $id)->with('success', 'Data Transaksi Berhasil Dibuat');
    }

    public function remove(Request $request, $detail_id)
    {
        $transaction_detail = TransactionDetail::find($detail_id);

        $transaction = Transaction::with('details', 'travel_packages')->find($transaction_detail->transaction_id);

        if($transaction_detail->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }
        $transaction->transaction_total -= $transaction->travel_packages->price;

        $transaction->save();

        $transaction_detail->delete();

        return redirect()->route('checkout', $transaction_detail->transaction_id)->with('success', 'Detail Transaksi Berhasil Hapus');
    }

    public function success($id)
    {
        $transaction = Transaction::with('details', 'travel_packages.galleries', 'users')->find($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        // Set configuration midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat array untuk dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'TEST-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total,
            ],

            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],

            'enabled_payments' => ['gopay'],
            'vtweb' => [],
        ];

        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // return $transaction;
        // kirim email ke user dan ticketnya
        // Mail::to($transaction->users->email)->send(new TransactionSuccess($transaction));
        // return view('pages.success');

    }
}
