<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use App\Http\Requests\StoreSlideshowRequest;
use App\Http\Requests\UpdateSlideshowRequest;
use App\Repositories\Slideshow\SlideshowRepository;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideshowRequest $request, Slideshow $slideshow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        //
    }
}
