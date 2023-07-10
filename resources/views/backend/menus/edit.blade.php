@extends('adminlte::page')

@section('title', env('APP_NAME', 'Editeaza meniul'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza meniul</h1>
        <a href="{{ route('menus.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('menus.update', ['menu'=>$menu->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nume">Nume</label>
    <input type="text" class="form-control" name="nume" id="nume" placeholder="Nume" value="{{ $menu->nume }}">
  </div>
  <div class="mb-3">
    <label for="descriere">Descriere</label>
    <textarea name="descriere" id="descriere" class="form-control" rows="5">{{ $menu->descriere }}</textarea>
  </div>
  <div class="mb-3">
    <label for="file">Document: {{ $menu->file }}</label>
    <input type="file" class="form-control" name="file" id="file" placeholder="Document">
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-warning text-white" type="submit">Editeaza</button>
  </div>
</form>
@stop

@section('css')

@stop

@section('js')

@stop