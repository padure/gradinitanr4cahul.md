@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza evenimentul</h1>
        <a href="{{ route('events.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('events.update', ['event'=>$event->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="title">Titlu</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titlu" value="{{ $event->title }}">
  </div>
  <div class="mb-3">
    <label for="description">Descriere</label>
    <textarea name="description" id="description" class="form-control" placeholder="Descriere">{{ $event->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="image">Imagine</label>
    <img src="{{ asset(env('UPLOADS_EVENT').$event->image) }}" alt="Imaginea lipseste" class="img-fluid w-25">
    <input type="file" class="form-control" name="image" id="image" placeholder="Imagine">
  </div>
  <div class="mb-3">
    <label for="event_construct">Conținutul noutății</label>
    <textarea name="body" id="event_construct" placeholder="Scrieți aici conținutul noutății">{{ $event->body }}</textarea>
  </div>
  <div class="mb-3">
    <label for="autor">Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="{{ $event->autor }}">
  </div>
  <div class="mb-3">
    <label for="event_category_id">Categorie</label>
    <select 
      class="form-control" 
      name="event_category_id" 
      id="event_category_id">
      @foreach ($eventCategories as $category)
        <option value="{{ $category->id }}">{{ $category->nume }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-warning text-white" type="submit">Editeaza</button>
  </div>
</form>
@stop

@section('css')
    
@stop

@section('js')
  @vite(['resources/js/editor.js'])
@stop