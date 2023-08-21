<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;

class HomeController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::with('galleries')->get();

        return view('pages.home', compact('travel_packages'));
    }
}
