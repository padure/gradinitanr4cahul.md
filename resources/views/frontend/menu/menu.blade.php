@extends('layouts.frontend')
@section('title', '| Meniul')
@php
    $menu = "";
    if(request()->routeIs('menu.index')) {
        $menu = "active";
    }
@endphp
@section('content')
    
@endsection
