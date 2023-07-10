@extends('adminlte::page')

@section('title', env('APP_NAME', 'Editeaza o grupa'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza o grupa</h1>
        <a href="{{ route('groups.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('groups.update', ['group'=>$group->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nume"><b class="text-danger">*</b> Nume</label>
    <input type="text" class="form-control" name="nume" id="nume" placeholder="Nume" value="{{ $group->nume }}">
  </div>
  <div class="mb-3">
    <label for="educator"> <b class="text-danger">*</b> Educator</label>
    <input type="text" class="form-control" name="educator" id="educator" placeholder="Educator" value="{{ $group->educator }}">
  </div>
  <div class="mb-3">
    <label for="functie"> <b class="text-danger">*</b> Functie</label>
    <input type="text" class="form-control" name="functie" id="functie" placeholder="Functie" value="{{ $group->functie }}">
  </div>
  <div class="mb-3">
    <label for="avatar">Poza educator</label>
    <img src="{{ asset(env('UPLOADS_GROUP').$group->avatar) }}" alt="Imaginea lipseste" class="member-img">
    <input type="file" class="form-control" name="avatar" id="avatar" placeholder="Imagine">
  </div>
  <div class="mb-3">
    <label for="img"><b class="text-danger">*</b> Imagine grupa</label>
    <img src="{{ asset(env('UPLOADS_GROUP').$group->img) }}" alt="Imaginea lipseste" class="member-img">
    <input type="file" class="form-control" name="img" id="img" placeholder="Imagine">
  </div>
  <div class="mb-3 row">
    <div class="col-4">
      <label for="varsta"> <b class="text-danger">*</b> Varsta</label>
      <input type="text" class="form-control" name="varsta" id="varsta" placeholder="Varsta: 3-5 Ani" value="{{ $group->varsta }}">
    </div>
    <div class="col-4">
      <label for="ora"> <b class="text-danger">*</b> Intervalul de ore</label>
      <input type="text" class="form-control" name="ora" id="ora" placeholder="8:00 - 17:00" value="{{ $group->ora }}">
    </div>
    <div class="col-4">
      <label for="capacitate"> <b class="text-danger">*</b> Capacitate</label>
      <input type="number" class="form-control" name="capacitate" id="capacitate" placeholder="Capacitate" min="1" max="35" value="{{ $group->capacitate }}">
    </div>
  </div>
  <div class="mb-3">
    <button class="btn btn-sm btn-warning text-white" type="submit">Editeaza</button>
  </div>
</form>
@stop

@section('css')
    <style>
      .member-img{
        width: 100px;
      }
    </style>
@stop

@section('js')

@stop