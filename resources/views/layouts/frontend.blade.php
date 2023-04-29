<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="top-header"></div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm main-nav">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <img src="{{ asset('logo.png') }}" alt="Zambetul">
                </a>
                <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-bars bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Acasă</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Noi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Echipa noastră</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Evenimente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Regimul zilei</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Meniul</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacte</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>

        </footer>
    </div>
</body>
</html>
