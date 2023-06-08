@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza o categorie</h1>
        <a href="{{ route('event-category.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('event-category.update', [ 'event_category' => $category->id ])}}" 
  method="post" 
  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nume">Nume</label>
    <input type="text" 
      class="form-control" 
      name="nume" 
      id="nume" 
      placeholder="Nume" 
      value="{{ $category->nume }}">
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-warning text-white" type="submit">Schimba</button>
  </div>
</form>
@stop

@section('css')
    
@stop

@section('js')
  
@stop