@extends('layouts.frontend')

@section('title', '| Despre noi')

@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4, {{ $settings->str??"" }}')

@php
    $about = "";
    if(request()->routeIs('about.index')) {
        $about = "active";
    }
@endphp

@section('content')
    <!-- Page Header End -->
    @include( 'frontend.partial.header', ['data' => 'Despre noi'] )
    <!-- Page Header End -->

    <!-- About Start -->
    @include( 'frontend.partial.about' )
    <!-- About End -->
@endsection
