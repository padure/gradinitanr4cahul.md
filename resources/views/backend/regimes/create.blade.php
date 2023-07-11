@extends('adminlte::page')

@section('title', env('APP_NAME', 'Adaugă program'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă program</h1>
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
<form action="{{ route('regimes.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="file">Programul zilnic</label>
    <input type="file" class="form-control" name="file" id="file" placeholder="Programul zilnic">
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