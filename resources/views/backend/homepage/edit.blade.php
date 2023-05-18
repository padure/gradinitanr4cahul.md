@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza Slideshow</h1>
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
<form action="{{ route('slideshows.update', ['slideshow' => $slideshow->id])}}" method="post" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title">Titlu</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titlu" value="{{ $slideshow->title }}">
  </div>
  <div class="mb-3">
    <label for="description">Descriere</label>
    <textarea name="description" class="form-control" id="description" rows="2">{{ $slideshow->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="image">Imagine</label> <br>
    <img class="w-25" src="{{ asset('img/uploads/slideshow/' . $slideshow->image) }}" alt="{{ $slideshow->title }}">
    <input type="file" class="form-control" name="image" id="image" placeholder="Imagine" value="{{ $slideshow->image }}">
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-success" type="submit">Editeaza</button>
  </div>
</form>
@stop

@section('css')
    
@stop

@section('js')

@stop