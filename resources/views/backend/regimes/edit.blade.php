@extends('adminlte::page')

@section('title', env('APP_NAME', 'Editeaza program'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza program</h1>
        <a href="{{ route('regimes.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('regimes.update', ['regime'=>$regime->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="file">Document: {{ $regime->file }}</label>
    <input type="file" class="form-control" name="file" id="file" placeholder="Program">
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