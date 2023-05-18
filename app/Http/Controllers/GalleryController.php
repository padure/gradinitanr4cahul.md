<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Http\Requests\Gallery\StoreGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Repositories\Gallery\GalleryRepository;
use App\Repositories\Gallery\GalleryCategoryRepository;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected GalleryRepository $galleryRepository,
        protected GalleryCategoryRepository $galleryCategoryRepository,
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = resolve(GalleryCategoryRepository::class)->getAll();
        return view('backend.gallery.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryCategory::get();
        return view('backend.gallery.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        foreach( $request->all()['image'] as $img ){
            $this->galleryRepository->save($img, $request->all()['gallery_category_id']);

        }
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
