@extends('layouts.frontend')
@section('title', '| Echipa noastră')
@php
    $team = "";
    if(request()->routeIs('team.index')) {
        $team = "active";
    }
@endphp
@section('content')
    
@endsection
