@extends('layouts.frontend')
@section('title', '| Contacte')
@php
    $contacts = "";
    if(request()->routeIs('contacts.index')) {
        $contacts = "active";
    }
@endphp

@section('meta_description', 'Grădinița nr 4 Zîmbetul Cahul')
@section('meta_keywords', 'Grădinița nr 4 Zîmbetul Cahul, Grădinița Cahul, Grădinița Zîmbetul, Grădinița Cahul, Grădinița nr 4, {{ $settings->str??"" }}')

@section('content')
    <!-- Page Header End -->
    @include( 'frontend.partial.header', ['data' => 'Contacte'] )
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Suntem aici să te ajutăm!</h1>
                <p>Bine ai venit la pagina noastră de contacte! Suntem o echipă dedicată și entuziastă, pregătită să răspundă la întrebările tale și să îți ofere asistență de calitate. Indiferent dacă ai întrebări despre produsele noastre, vrei să ne transmiți feedback sau ai nevoie de ajutor în rezolvarea unei probleme, suntem aici să te susținem. <br>
                Ne punem la dispoziție informațiile de contact necesare pentru a ne găsi ușor. Poți să ne suni la numărul afișat sau să ne trimiți un e-mail, iar echipa noastră vă va răspunde cât mai rapid posibil.</p>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                    </div>
                    <h6>Creșa-Grădiniță Nr.4 „Zimbetul” mun. Cahul</h6>
                    <h6>{{ $settings->str??"" }}</h6>
                </div>
                <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-envelope-open fa-2x text-primary"></i>
                    </div>
                    <h6>{{ $settings->email??"" }}</h6>
                </div>
                <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                        <i class="fa fa-phone-alt fa-2x text-primary"></i>
                    </div>
                    <h6>{{ $settings->tf??"" }}</h6>
                </div>
            </div>
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <p class="mb-4">Folosește formularul nostru simplu de contact pentru a ne transmite rapid orice întrebări, feedback sau solicitări ai. Echipa noastră va răspunde prompt și se va asigura că primești asistența necesară.</p>
                            @if ($errors->any())
                                <div class="alert alert-danger bg-primary text-white rounded-0">
                                    <ol class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                            <form action="{{ route('contact.message') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" name="name" class="form-control border-0" id="name" placeholder="Numele și prenumele">
                                            <label for="name">Numele și prenumele</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" name="email" class="form-control border-0" id="email" placeholder="Numărul de telefon">
                                            <label for="email">Numărul de telefon</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="subject" class="form-control border-0" id="subject" placeholder="Subiect">
                                            <label for="subject">Subiect</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Leave a message here" id="message" name="message" style="height: 100px"></textarea>
                                            <label for="message">Mesajul</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Trimite mesajul</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11107.029664241863!2d28.2099842!3d45.8961646!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b65c9c620cd699%3A0x6fc1c0af35ccc051!2zR3LEg2RpbmnIm2EgbnI0IFrDrm1iZXR1bCBDYWh1bA!5e0!3m2!1sro!2s!4v1689073008875!5m2!1sro!2s" 
                                frameborder="0" 
                                style="min-height: 400px; border:0;" 
                                allowfullscreen="" 
                                aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.js') }}"></script>
@endpush
@if(session('success'))
    @push('scripts')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Succes',
                text: '{{ session('success') }}',
            });
        </script>
    @endpush
@endif