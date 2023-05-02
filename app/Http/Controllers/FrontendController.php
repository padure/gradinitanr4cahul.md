<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.home.index');
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
    public function gallery(){
        return view('frontend.gallery.gallery');
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
