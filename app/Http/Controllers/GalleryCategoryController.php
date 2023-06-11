<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryCategory;

class GalleryCategoryController extends Controller
{
    public function store(Request $request){
        GalleryCategory::create($request->all());
        $categories = GalleryCategory::get()->last();
        return response()->json($categories);
    }
    public function destroy(GalleryCategory $galleryCategory){
        $categorii = $galleryCategory->images()->get();
        foreach ($categorii as $categorie) {
            if (file_exists(env('UPLOADS_GALLERY') . $categorie->image)) {
                unlink(env('UPLOADS_GALLERY') . $categorie->image);
            }
        }
        $galleryCategory->delete();
        return to_route('gallery.index')
        ->with('success', 'Înregistrare ștearsă cu succes.');
    }
}
