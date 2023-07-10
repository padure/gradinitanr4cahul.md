@extends('layouts.frontend')

@section('title', '| Despre noi')

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
