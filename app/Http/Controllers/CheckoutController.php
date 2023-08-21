<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $transactions = Transaction::with('details', 'travel_packages', 'users')->find($id);

        return view('pages.checkout', compact('transactions'));
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

        $transaction = Transaction::with('travcel_packages')->find($id);

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
        $transaction = Transaction::find($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
