<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use App\Http\Requests\StoreSlideshowRequest;
use App\Http\Requests\UpdateSlideshowRequest;
use App\Repositories\Slideshow\SlideshowRepository;
use Intervention\Image\ImageManagerStatic as Image;

class SlideshowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SlideshowRepository $slideshowRepository,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slideshows = resolve(SlideshowRepository::class)->getAll();
        return view('backend.homepage.index')
            ->with('slideshows', $slideshows);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.homepage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideshowRequest $request)
    {
        $this->slideshowRepository->save($request->all());
        return redirect()->route('slideshows.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slideshow $slideshow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slideshow $slideshow)
    {
        return view('backend.homepage.edit')
            ->with('slideshow', $slideshow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideshowRequest $request, Slideshow $slideshow)
    {
        $slideshow->title = $request->title;
        $slideshow->description = $request->description;
        if( $request->image === null ){
            $slideshow->image = $slideshow->image;
        }else{
            if (file_exists(env('UPLOADS_SLIDESHOW') . $slideshow->image)) {
                unlink(env('UPLOADS_SLIDESHOW') . $slideshow->image);
            }
            $extension  = $request->image->getClientOriginalExtension();
            $fileName   = $request->image->getClientOriginalName();
            $slideshow->image       = time().'.'.$extension;
            Image::make($request->image)
                ->fit(1366, 768)
                ->save(public_path(env('UPLOADS_SLIDESHOW')) . $slideshow->image);
        }
        $slideshow->save();
        return redirect()->route('slideshows.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        if (file_exists(env('UPLOADS_SLIDESHOW') . $slideshow->image)) {
            unlink(env('UPLOADS_SLIDESHOW') . $slideshow->image);
        }
        $slideshow->delete();
        return redirect()->route('slideshows.index');
    }
}
