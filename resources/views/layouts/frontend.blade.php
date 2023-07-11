<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Zambetul')}} @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="@yield('meta_description', config('app.name', 'Zambetul'))">
    <meta name="keywords" content="@yield('meta_keywords', config('app.name', 'Zambetul'))">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    @stack('styles')
</head>
<body>
  <div class="container-fluid bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="{{ route('home.index')}}" class="navbar-brand logo">
            <img src="{{ asset('logo.png') }}" alt="Zambetul">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('home.index')}}" class="nav-item nav-link {{ $home??"" }}">Acasă</a>
                <div class="nav-item dropdown dropdown-link">
                    <a href="#" class="nav-link dropdown-toggle  {{ $about??"" }}" data-bs-toggle="dropdown" aria-expanded="false">Despre noi</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                        <a href="{{ route('about.index')}}"         class="dropdown-item">Despre noi</a>
                        <a href="{{ route('law.index')}}"    class="dropdown-item">Cadrul legislativ și normativ</a>
                    </div>
                </div>
                <a href="{{ route('team.index')}}" class="nav-item nav-link {{ $team??"" }}">Echipa noastră</a>
                <div class="nav-item dropdown dropdown-link">
                    <a href="#" class="nav-link dropdown-toggle {{ $eventLink??"" }}" data-bs-toggle="dropdown" aria-expanded="false">Activități</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                        <a href="{{ route('event.index')}}" class="dropdown-item">Evenimente</a>
                        <a href="{{ route('galerie.index')}}" class="dropdown-item">Galerie</a>
                    </div>
                </div>
                <a href="{{ route('regime.index')}}" class="nav-item nav-link {{ $regime??"" }}">Programul zilei</a>
                <a href="{{ route('menu.index')}}" class="nav-item nav-link {{ $menu??"" }}">Meniul</a>
                <a href="{{ route('contacts.index')}}" class="nav-item nav-link {{ $contacts??"" }}">Contacte</a>
            </div>
            {{-- <a href="" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Join Us<i class="fa fa-arrow-right ms-3"></i></a> --}}
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 m-auto">
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-white mb-4">Aici ne găsiți</h3>
                    <p class="mb-2">Creșa-Grădiniță Nr.4 „Zîmbetul” mun. Cahul</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $settings->str??"" }}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $settings->tf??"" }}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $settings->email??"" }}</p>
                    <div class="d-flex pt-2">
                        @if ( $settings !== null )
                            @if ($settings->twitter)
                                <a class="btn btn-outline-light btn-social" href="{{ url($settings->twitter) }}" target="_blanck">
                                    <i class="fab fa-twitter"></i>
                                </a> 
                            @endif
                            @if ($settings->facebook)
                                <a class="btn btn-outline-light btn-social" href="{{ url($settings->facebook) }}" target="_blanck">
                                    <i class="fab fa-facebook-f"></i>
                                </a> 
                            @endif
                            @if ($settings->youtube)
                                <a class="btn btn-outline-light btn-social" href="{{ url($settings->youtube) }}" target="_blanck">
                                    <i class="fab fa-youtube"></i>
                                </a> 
                            @endif
                            @if ($settings->linkedin)
                                <a class="btn btn-outline-light btn-social" href="{{ url($settings->linkedin) }}" target="_blanck">
                                    <i class="fab fa-linkedin-in"></i>
                                </a> 
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-white mb-4">Scurtaturi</h3>
                    <a class="btn btn-link text-white-50" href="{{ route('team.index')}}">Echipa noastră</a>
                    <a class="btn btn-link text-white-50" href="{{ route('contacts.index')}}">Contacte</a>
                    <a class="btn btn-link text-white-50" href="{{ route('menu.index')}}">Meniul</a>
                    <a class="btn btn-link text-white-50" href="{{ route('event.index')}}">Evenimente</a>
                    <a class="btn btn-link text-white-50" href="#">Termeni & Condiții</a>
                </div>
                <div class="col-lg-4 col-md-6 mx-auto">
                    @if ($lastPhotos->count() > 0)
                    <h3 class="text-white mb-4">Pozele noastre</h3>
                    <div class="row g-2 pt-2">
                        @foreach ($lastPhotos as $foto)
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1 img-footer" src="{{ asset(env('UPLOADS_GALLERY') . $foto->image) }}" alt="Lipseste">
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ route('home.index')}}">{{ config('app.name', 'Zambetul') }}</a>. <br>
                        {{ date('Y') }} Toate drepturile rezervate. Creată și întreținută de: <a class="border-bottom" href="#" target="_blank">SeeYou</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ route('home.index')}}">Acasa</a>
                            <a href="{{ route('about.index')}}">Despre noi</a>
                            <a href="{{ route('contacts.index')}}">Contacte</a>
                            <a href="{{ route('login') }}">Autentificare</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>
  <!-- JavaScript Libraries -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('https://unpkg.com/@popperjs/core@2') }}"></script>
  <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <!-- Template Javascript -->
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
