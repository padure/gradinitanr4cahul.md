@extends('layouts.frontend')
@section('title', '| Regimul zilei')
@php
    $regime = "";
    if(request()->routeIs('regime.index')) {
        $regime = "active";
    }
@endphp
@section('content')
    
@endsection
