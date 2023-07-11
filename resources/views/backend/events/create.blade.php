@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă un eveniment</h1>
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
<form action="{{ route('events.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title">Titlu</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titlu">
  </div>
  <div class="mb-3">
    <label for="description">Descriere</label>
    <textarea name="description" id="description" class="form-control" placeholder="Descriere"></textarea>
  </div>
  <div class="mb-3">
    <label for="image">Imagine</label>
    <input type="file" class="form-control" name="image" id="image" placeholder="Imagine">
  </div>
  <div class="mb-3">
    <label for="event_construct">Conținutul noutății</label>
    <textarea name="body" id="event_construct" placeholder="Scrieți aici conținutul noutății"></textarea>
  </div>
  <div class="mb-3">
    <label for="autor">Autor</label>
    <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor">
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
    <button class="btn btn-sm btn-success" type="submit">Salveaza</button>
  </div>
</form>
@stop

@section('css')
  <link rel="stylesheet" href="{{ asset('build/assets/app-04121afd.css') }}">
	<style>
		.ck-editor__editable_inline{
		  min-height: 500px;
		}
  </style>
@stop

@section('js')
  <script src="{{ asset('build/assets/app-13952320.js') }}" type="module"></script>
@stop