@extends('layouts.frontend')
@section('title', $event->title)
@php
    use Illuminate\Support\Str;
    $eventLink = "";
    if(request()->routeIs('event.show')) {
        $eventLink = "active";
    }
@endphp

@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4, {{ $settings->str??"" }}')

@section('content')
    <!-- Page Header End -->
    @include( 'frontend.partial.header', ['data' => 'Eveniment', 'event' => $event] )
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <h1 class="mb-3">{{ $event->title }}</h1>
                    <div class="d-flex gap-4">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $event->autor }}</p>
                        <p class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $event->eventCategory->nume }}</p>
                    </div>
                </div>
                <div class="mb-5 post-body">
                    <img class="img-fluid rounded w-100 mb-4" src="{{ asset(env('UPLOADS_EVENT').$event->image) }}" alt="Image">
                    {!! $event->body !!}
                </div>

            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categorii</h2>
                    <ul class="list-group list-group-flush">
                        @forelse ($categories as $categorie)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="{{ route('event.category', [ 'category' => Str::slug( $categorie->nume ."-". $categorie->id) ]) }}">{{ $categorie->nume }}</a>
                            </li>
                        @empty
                            <p>Nu sunt evenimente în baza de date</p>
                        @endforelse
                    </ul>
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Noutăți recente</h2>
                    @forelse ($lastEvents as $event)
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3 recent-post">
                            <img class="img-fluid last-post-img me-3" src="{{ asset(env('UPLOADS_EVENT').$event->image) }}">
                            <div class="pl-3">
                                <h6 class="">
                                    <a href="{{ route('event.show', [ 'title' => Str::slug( $event->title ."-". $event->id) ]) }}">{{ $event->title }}</a>
                                </h5>
                                <div class="d-flex">
                                    <small class="mr-3 me-2"><i class="fa fa-user text-primary"></i> {{ $event->autor }}</small>
                                    <small class="mr-3 me-2"><i class="fa fa-folder text-primary"></i> {{ $event->eventCategory->nume }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Nu sunt evenimente in baza de date</p>
                    @endforelse
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection

@push('styles')
  <style>
    .last-post-img{
      width: 80px;
      height: 80px;
      object-fit: cover;
      object-position: center;
    }
    .recent-post a{
        color: #103741!important;
    }
    iframe{
      width: 100%;
      height: 450px;
    }
    *::selection{
        color: white;
        background-color: #FE5D37;
    }
    P{
        text-align: justify;
        line-height: 2;
    }
    p > img, figure > img, .image_resized{
        width: 100%!important;
    }
    .post-body li{
        text-align: justify;
        line-height: 2;
    }
  </style>
@endpush

@push('scripts')
  <script>
      const media = document.querySelectorAll(".media oembed")
      Array.from(media).map( e => {
        let url = e.getAttribute('url')
        let iframe = `<iframe src="${url}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`
        e.outerHTML = iframe
      })
  </script>
@endpush