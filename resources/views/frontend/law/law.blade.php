@extends('layouts.frontend')

@section('title', '| Cadrul legislativ și normativ')

@php
    $about = "";
    if(request()->routeIs('law.index')) {
        $about = "active";
    }
@endphp

@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4, {{ $settings->str??"" }}')

@section('content')
    <!-- Page Header End -->
    @include( 'frontend.partial.header', ['data' => 'Cadrul legislativ și normativ'] )
    <!-- Page Header End -->

    <!-- Laws Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                @foreach ($sections as $section)
                    @if ($section->laws()->count() > 0)
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                            <h1 class="mb-4">{{ $section->nume }}</h1>
                            @foreach ( $section->laws()->get() as $law)
                                <p class="mb-4">
                                    <a href="{{ asset(env('UPLOADS_LAW').$law->file) }}" class="law" target="_blanck">{{ $law->nume }}</a>
                                </p>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Laws End -->
@endsection

@push('styles')
    <style>
        .law{
            color: #74787C!important;
        }
        .law:hover{
            color: #fe5d37!important;
        }
    </style>
@endpush