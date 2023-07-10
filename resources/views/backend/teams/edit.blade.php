@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza membrul</h1>
        <a href="{{ route('teams.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('teams.update', ['team'=>$member->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nume">Nume</label>
    <input type="text" class="form-control" name="nume" id="nume" placeholder="Nume" value="{{ $member->nume }}">
  </div>
  <div class="mb-3">
    <label for="functie">Functie</label>
    <input type="text" class="form-control" name="functie" id="functie" placeholder="Functie" value="{{ $member->functie }}">
  </div>
  <div class="mb-3">
    <label for="img">Imagine</label>
    <img src="{{ asset(env('UPLOADS_MEMBER').$member->img) }}" alt="Imaginea lipseste" class="member-img">
    <input type="file" class="form-control" name="img" id="img" placeholder="Imagine">
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