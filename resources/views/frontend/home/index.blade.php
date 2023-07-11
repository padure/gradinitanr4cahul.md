@extends('layouts.frontend')
@section('title', '| Acasa')
@php
    $home = "";
    if(request()->routeIs('home.index')) {
        $home = "active";
    }
@endphp
@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4 ' . $settings->str??'')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            @forelse ($slideshows as $slideshow)
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ env('UPLOADS_SLIDESHOW').$slideshow->image}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">{{ $slideshow->title }}</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $slideshow->description }}</p>
                                <a href="{{ route('about.index')}}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Despre noi</a>
                                <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Grupele noastre</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Make A Brighter Future For Your Child</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>
                                <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facilities Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Oportunitățile grădiniței</h1>
                <p>Bun venit în grădinița noastră minunată, unde copiii beneficiază de oportunități nelimitate pentru dezvoltare și descoperire! Cu facilități de învățare moderne, cadre didactice calificate și programe educative inovatoare, ne asigurăm că fiecare copil are posibilitatea de a-și explora potențialul și de a crește într-un mediu sigur și stimulant.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="facility-item">
                        <div class="facility-icon bg-primary">
                            <span class="bg-primary"></span>
                            <i class="fas fa-palette fa-3x text-primary"></i>
                            <span class="bg-primary"></span>
                        </div>
                        <div class="facility-text bg-primary">
                            <h3 class="text-primary mb-3">Explorare și dezvoltare</h3>
                            <p class="mb-0">Dezvoltarea creativității prin artă și joc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="facility-item">
                        <div class="facility-icon bg-success">
                            <span class="bg-success"></span>
                            <i class="fas fa-puzzle-piece fa-3x text-success"></i>
                            <span class="bg-success"></span>
                        </div>
                        <div class="facility-text bg-success">
                            <h3 class="text-success mb-3">Învățarea prin joc</h3>
                            <p class="mb-0">Învățarea prin experiențe practice și joc interactiv.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="facility-item">
                        <div class="facility-icon bg-warning">
                            <span class="bg-warning"></span>
                            <i class="fas fa-users fa-3x text-warning"></i>
                            <span class="bg-warning"></span>
                        </div>
                        <div class="facility-text bg-warning">
                            <h3 class="text-warning mb-3">Interacțiunea socială</h3>
                            <p class="mb-0">Interacțiune socială și dezvoltarea abilităților sociale.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="facility-item">
                        <div class="facility-icon bg-info">
                            <span class="bg-info"></span>
                            <i class="fas fa-book fa-3x text-info"></i>
                            <span class="bg-info"></span>
                        </div>
                        <div class="facility-text bg-info">
                            <h3 class="text-info mb-3">Fundamente solide</h3>
                            <p class="mb-0">Fundamente solide pentru învățare ulterioară.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities End -->

    <!-- About Start -->
    @include( 'frontend.partial.about' )
    <!-- About End -->

    <!-- Classes Start -->
    @include( 'frontend.partial.clase', ['groups'=>$groups] )
    <!-- Classes End -->

    <!-- Pozele noastre Start -->
    @include( 'frontend.partial.poze' )
    <!-- Pozele noastre End -->

    <!-- Testimonial Start -->
    <!--div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Clienții noștri spun!</h1>
                <p>Descoperiți impresiile entuziasmante ale clienților noștri și aflați de ce ei consideră că grădinița noastră este alegerea perfectă pentru dezvoltarea și fericirea copiilor lor.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Client Name</h3>
                            <span>Profession</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Client Name</h3>
                            <span>Profession</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Client Name</h3>
                            <span>Profession</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
            </div>
        </div>
    </div-->
    <!-- Testimonial End -->
@endsection

@push('styles')
    <style>
        .galerie img:hover{
            cursor: pointer;
            box-shadow: #333333cc 0px 6px 24px 0px, 333333cc 0px 0px 0px 1px;
        }
    </style>
@endpush