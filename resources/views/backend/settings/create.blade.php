@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă informații</h1>
        <a href="{{ route('settings.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('settings.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="director">Director</label>
    <input type="text" class="form-control" name="director" id="director" placeholder="Director">
  </div>
  <div class="mb-3">
    <label for="str">Strada</label>
    <input type="text" class="form-control" name="str" id="str" placeholder="Strada">
  </div>
  <div class="mb-3">
    <label for="tf">Telefon</label>
    <input type="tel" class="form-control" name="tf" id="tf" placeholder="Telefonul">
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="twitter">Link-twitter</label>
    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Link">
  </div>
  <div class="mb-3">
    <label for="facebook">Link-facebook</label>
    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Link">
  </div>
  <div class="mb-3">
    <label for="youtube">Link-youtube</label>
    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Link">
  </div>
  <div class="mb-3">
    <label for="linkedin">Link-linkedin</label>
    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Link">
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