<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelPackages = TravelPackage::all();

        return view('pages.admin.travel-package.index', compact('travelPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelPackageRequest $travelPackageRequest)
    {
        $validated = $travelPackageRequest->validated();
        $validated['slug'] = Str::slug($validated['title']);

        $TravelPackage = TravelPackage::create($validated);

        return redirect()->route('travel-package.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tp = TravelPackage::find($id);

        return view('pages.admin.travel-package.edit', compact('tp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPackageRequest $travelPackageRequest, $id)
    {
        $validated = $travelPackageRequest->validated();
        $validated['slug'] = Str::slug($validated['title']);

        $TravelPackage = TravelPackage::find($id)->update($validated);

        return redirect()->route('travel-package.index')->with('success', 'Data Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $TravelPackage = TravelPackage::find($id)->delete();

        return redirect()->route('travel-package.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
