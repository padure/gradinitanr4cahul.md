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
    public function destroy(Request $request){
        dd($request);
    }
}
