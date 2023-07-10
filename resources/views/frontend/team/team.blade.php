@extends('layouts.frontend')

@section('title', '| Echipa noastră')

@php
    $team = "";
    if(request()->routeIs('team.index')) {
        $team = "active";
    }
@endphp

@section('content')
    <!-- Page Header End -->
    <div class="container-xxl py-5 page-header bg-header-team position-relative mb-5">
        <div class="container py-5">
            <h1 class="display-2 text-white animated slideInDown mb-4">Echipa noastra</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Acasa</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Echipa noastra</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Echipa Noastră de Profesioniști</h1>
                <p>Fiecare membru al echipei noastre este instruit și pregătit să ofere sprijin individualizat și să încurajeze dezvoltarea emoțională, intelectuală și socială a fiecărui copil. Cu un mix de creativitate, răbdare și experiență, ei ghidează și inspirează copiii noștri să descopere lumea, să-și dezvolte abilitățile și să-și exploreze curiozitatea într-un mod ludic și interactiv.</p>
            </div>
            <div class="row">
                @forelse ($members as $member)
                    <div class="col-lg-4 col-md-6 member-section">
                        <div class="row p-3">
                            <div class="bg-light text-dark p-2 d-flex align-items-center justify-content-center col">{{ $loop->iteration }}</div>
                            <div class="bg-light text-dark p-2 d-flex align-items-center justify-content-center col">{{ $member->nume }}</div>
                            <div class="bg-light text-dark p-2 d-flex align-items-center justify-content-center col">{{ $member->functie }}</div>
                            <div class="bg-light text-dark p-2 d-flex align-items-center justify-content-center col">
                                @if ($member->img !== null)
                                    <img src="{{ asset(env('UPLOADS_MEMBER').$member->img) }}" 
                                        class="w-100 rounded-circle" 
                                        alt="{{ $member->nume }}">
                                @else
                                    <div style="height: 84px;"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="row p-3">
                            <div class="bg-light p-5 d-flex align-items-center justify-content-center col">
                                Nu exista membri in baza de date
                            </div>
                        </div>
                    </div>
                @endforelse
                
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection

@push('styles')
    <style>
        .member-section:hover{
            cursor: pointer;
            box-shadow: rgb(255, 245, 243) 0px 6px 24px 0px, rgb(255, 245, 243) 0px 0px 0px 1px;
        }
    </style>
@endpush

@push('scripts')
    
@endpush