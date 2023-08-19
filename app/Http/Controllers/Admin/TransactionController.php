<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('details', 'travel_packages', 'users')->get();

        return view('pages.admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::with('details', 'travel_packages', 'users')->find($id);

        return view('pages.admin.transaction.detail', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::find($id);
        $transactionStatus = ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL', 'FAILED'];

        return view('pages.admin.transaction.edit', compact('transaction', 'transactionStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $transactionRequest, $id)
    {
        $validated = $transactionRequest->validated();
        $transaction = Transaction::find($id)->update($validated);

        return redirect()->route('transaction.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);
        $transactionDetails = TransactionDetail::where('transaction_id', $id)->get();
        foreach ($transactionDetails as $transactionDetail) {
            $transactionDetail->delete();
        }
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Data berhasil dihapus');
    }
}
