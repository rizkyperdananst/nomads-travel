<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $travel_package = TravelPackage::all()->count();
        $transaction = Transaction::all()->count();
        $transaction_pending = Transaction::where('transaction_status', 'PENDING')->count();
        $transaction_success = Transaction::where('transaction_status', 'SUCCESS')->count();

        return view('pages.admin.dashboard', compact('travel_package', 'transaction', 'transaction_pending', 'transaction_success'));
    }
}
