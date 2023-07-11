@extends('layouts.frontend')
@section('title', '| Meniul')
@php
    $menu = "";
    if(request()->routeIs('menu.index')) {
        $menu = "active";
    }
@endphp

@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4 ' . $settings->str??'')

@section('content')
    <!-- Page Header End -->
        @include( 'frontend.partial.header', ['data' => 'Meniul'] )
    <!-- Page Header End -->

    <!-- Laws Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp col-8" data-wow-delay="0.1s">
                <h1 class="mb-3">{{ $menuFile->nume }}</h1>
                <p>{{ $menuFile->descriere }}</p>
            </div>
            <div class="row g-5 align-items-center wow fadeInUp" data-wow-delay="0.1s">
                <embed  src="{{ asset(env('UPLOADS_MENU') . $menuFile->file) }}" width="100%" height="1200px" type="application/pdf">
            </div>
        </div>
    </div>
    <!-- Laws End -->
@endsection
