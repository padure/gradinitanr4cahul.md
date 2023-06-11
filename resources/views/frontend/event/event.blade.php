@extends('layouts.frontend')
@section('title', '| Evenimente')
@php
    use Illuminate\Support\Str;
@endphp
@section('content')
    <!-- Page Header End -->
    <div class="container-xxl py-5 page-header position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Evenimente</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Acasa</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Evenimente</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Evenimente</span></p>
                <h1 class="mb-4">Cele mai recente activități</h1>
            </div>
            <div class="row pb-3">
                @forelse ($events as $event)
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="{{ asset(env('UPLOADS_EVENT').$event->image) }}" alt="">
                            <div class="card-body bg-light text-center p-4">
                                <h4 class="title" title="{{ $event->title }}">{{ Str::limit($event->title, env('TITLE_LIMIT_EVENT')) }}</h4>
                                <div class="d-flex justify-content-center mb-3 gap-3">
                                    <small class="mr-3 ps-2"><i class="fa fa-user text-primary me-1"></i>{{ $event->autor }}</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary me-1"></i> {{ $event->eventCategory->nume }}</small>
                                </div>
                                <p title="{{ $event->description }}">
                                    {{ Str::limit($event->description, env('BODY_LIMIT_EVENT')) }}
                                </p>
                                <a  href="{{ route('event.show', [ 'title' => Str::slug( $event->title ."-". $event->id) ]) }}" 
                                    class="btn btn-primary px-4 mx-auto my-2">
                                    Mai mult
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Nu sunt evenimente in baza de date</p>
                @endforelse
                
                <div class="col-md-12 my-4">
                    <div class="d-flex justify-content-center">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection

@push('styles')
  <style>
    iframe{
      width: 500px;
      height: 350px;
    }
  </style>
@endpush

@push('scripts')
  <script>
      
  </script>
@endpush
