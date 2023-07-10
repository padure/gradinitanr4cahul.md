@extends('layouts.frontend')
@section('title', '| Regimul zilei')
@php
    $regime = "";
    if(request()->routeIs('regime.index')) {
        $regime = "active";
    }
@endphp
@section('content')
    <!-- Page Header End -->
        @include( 'frontend.partial.header', ['data' => 'Regimul zilei'] )
    <!-- Page Header End -->

    <!-- Laws Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                
            </div>
        </div>
    </div>
    <!-- Laws End -->
@endsection
