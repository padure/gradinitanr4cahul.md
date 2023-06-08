@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă Slideshow</h1>
        <a href="{{ route('slideshows.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
    </div>
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('slideshows.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title">Titlu</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titlu">
  </div>
  <div class="mb-3">
    <label for="description">Descriere</label>
    <textarea name="description" class="form-control" id="description" rows="2"></textarea>
  </div>
  <div class="mb-3">
    <label for="image">Imagine</label>
    <input type="file" class="form-control" name="image" id="image" placeholder="Imagine">
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-success" type="submit">Salveaza</button>
  </div>
</form>
@stop

@section('css')
    
@stop

@section('js')

@stop