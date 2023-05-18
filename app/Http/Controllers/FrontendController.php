<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Repositories\Slideshow\SlideshowRepository;
use App\Models\Gallery;
use App\Models\GalleryCategory;

class FrontendController extends Controller
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
    public function index(){
        $slideshows = $this->slideshowRepository->getAll();
        return view('frontend.home.index')
            ->with('slideshows', $slideshows);
    }
    public function about(){
        return view('frontend.about.about');
    }
    public function contacts(){
        return view('frontend.contacts.contacts');
    }
    public function event(){
        return view('frontend.event.event');
    }
    public function galerie(){
        $categories = GalleryCategory::get();
        $images = Gallery::get();
        return view('frontend.gallery.gallery')
            ->with('categories', $categories)
            ->with('images', $images);
    }
    public function menu(){
        return view('frontend.menu.menu');
    }
    public function regime(){
        return view('frontend.regime.regime');
    }
    public function team(){
        return view('frontend.team.team');
    }
}
