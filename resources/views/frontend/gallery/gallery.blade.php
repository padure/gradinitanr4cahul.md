@extends('layouts.frontend')
@section('title', '| Galerie')
@section('meta')
    <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" >
@endsection
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- Gallery Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Galeria Noastră</span></p>
                <h1 class="mb-4">Galeria Grădiniței Noastre</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-outline-primary m-1 active"  data-filter="*">Toate</li>
                        @foreach ($categories as $categorie)
                            <li class="btn btn-outline-primary m-1" data-filter=".{{ Str::slug($categorie->name, '-'); }}">
                                {{ $categorie->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($images as $image)
                    <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ Str::slug($image->galleryCategory()->get()->first()->name, '-'); }}">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100 my-image" src="{{ env('UPLOADS_GALLERY') . $image->image }}" alt="">
                            <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                <a href="{{ env('UPLOADS_GALLERY') . $image->image }}" data-lightbox="portfolio">
                                    <i class="fa fa-eye text-white" style="font-size: 60px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery End -->
@endsection
@push('styles')
    <style> 
        .portfolio-item .portfolio-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            bottom: 30px;
            left: 30px;
            opacity: 0;
            transition: .5s;
        }

        .portfolio-item:hover .portfolio-btn {
            opacity: 1;
        }
        #portfolio-flters .active{
            color: white!important;
        }
        .btn-outline-primary:hover{
            color: white!important;
        }
        .lb-image{
            width: 85vh!important;
            height: 85vh!important;
            object-fit: cover!important;
        }
        .my-image{
            height: 35vh;
            object-fit: cover
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        // Portfolio isotope and filter
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'fitRows'
        });

        $('#portfolio-flters li').on('click', function () {
            $("#portfolio-flters li").removeClass('active');
            $(this).addClass('active');

            portfolioIsotope.isotope({filter: $(this).data('filter')});
        });
    </script>
@endpush

