@extends('adminlte::page')

@section('title', env('APP_NAME', 'Act'))

@section('content_header')
    <div class="d-flex justify-content-between">
      <h1>{{ $law->nume }}</h1>
      <a href="{{ route('laws.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
  </div>
@stop

@section('content')
  <embed  src="{{ asset(env('UPLOADS_LAW').$law->file) }}" width="80%" height="900px" type="application/pdf">
@stop

@section('css')
  <style>
    
  </style>
@stop

@section('js')
  <script>
      
  </script>
@stop