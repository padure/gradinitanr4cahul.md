@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
      <h1>{{ $event->title }}</h1>
      <a href="{{ route('events.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
  </div>
@stop

@section('content')
    {!! $event->body !!}
@stop

@section('css')
  <style>
    iframe{
      width: 500px;
      height: 350px;
    }
  </style>
@stop

@section('js')
  <script>
      const media = document.querySelectorAll(".media oembed")
      Array.from(media).map( e => {
        let url = e.getAttribute('url')
        let iframe = `<iframe src="${url}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`
        e.outerHTML = iframe
      } )
  </script>
@stop