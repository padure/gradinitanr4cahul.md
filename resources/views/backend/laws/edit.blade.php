@extends('adminlte::page')

@section('title', env('APP_NAME', 'Editeaza documentul'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Editeaza documentul</h1>
        <a href="{{ route('laws.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
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
<form action="{{ route('laws.update', ['law'=>$law->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="nume">Nume</label>
    <input type="text" class="form-control" name="nume" id="nume" placeholder="Nume" value="{{ $law->nume }}">
  </div>
  <div class="mb-3">
    <label for="section_id">Categorie</label>
    <select 
      class="form-control" 
      name="section_id" 
      id="section_id">
      @foreach ($sections as $section)
        <option value="{{ $section->id }}">{{ $section->nume }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="file">Document: {{ $law->nume }}</label>
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