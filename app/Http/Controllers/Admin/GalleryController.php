<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\GalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('travel_packages')->get();

        return view('pages.admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.create', compact('travel_packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $galleryRequest)
    {
        $validated = $galleryRequest->validated();
        
        $extension = $galleryRequest->file('image')->extension();
        $fileName = 'gallery' . '-' . time() . '.' . $extension;
        $path = $galleryRequest->file('image')->storeAs('galleries', $fileName, 'public');

        $gallery = Gallery::create([
            'travel_package_id' => $galleryRequest->travel_package_id,
            'image' => $fileName,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Data Berhasil Ditambahkan!');
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
        $g = Gallery::find($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit', compact('g', 'travel_packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $updateGalleryRequest, string $id)
    {
        $validated = $updateGalleryRequest->validated();
        
        $gallery = Gallery::find($id);

        if($updateGalleryRequest->file('image')) {
            $imageOld = 'storage/galleries/'. $gallery->image;
            if(File::exists($imageOld)) {
                File::delete($imageOld);

                $extension = $updateGalleryRequest->file('image')->extension();
                $fileName = 'gallery' . '-' . time() . '.' . $extension;
                $path = $updateGalleryRequest->file('image')->storeAs('galleries', $fileName, 'public');

            }
        } else {
            $fileName = $gallery->image;
        }

        $gallery = Gallery::find($id)->update([
            'travel_package_id' => $updateGalleryRequest->travel_package_id,
            'image' => $fileName,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        $imageOld = File::delete('storage/galleries/'. $gallery->image);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Data Berhasil Di Hapus');
    }
}
