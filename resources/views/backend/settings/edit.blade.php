@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza informatiile</h1>
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
<form action="{{ route('settings.update', ['setting'=>$setting->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="director">Director</label>
    <input type="text" class="form-control" name="director" id="director" placeholder="director" value="{{ $setting->director }}">
  </div>
  <div class="mb-3">
    <label for="str">Strada</label>
    <input type="text" class="form-control" name="str" id="str" placeholder="str" value="{{ $setting->str }}">
  </div>
  <div class="mb-3">
    <label for="tf">Telefon</label>
    <input type="tel" class="form-control" name="tf" id="tf" placeholder="tf" value="{{ $setting->tf }}">
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ $setting->email }}">
  </div>
  <div class="mb-3">
    <label for="twitter">Link-twitter</label>
    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="twitter" value="{{ $setting->twitter }}">
  </div>
  <div class="mb-3">
    <label for="facebook">Link-facebook</label>
    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="facebook" value="{{ $setting->facebook }}">
  </div>
  <div class="mb-3">
    <label for="youtube">Link-youtube</label>
    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="youtube" value="{{ $setting->youtube }}">
  </div>
  <div class="mb-3">
    <label for="linkedin">Link-linkedin</label>
    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="linkedin" value="{{ $setting->linkedin }}">
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