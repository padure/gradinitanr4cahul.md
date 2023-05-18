@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Evenimente</h1>
        <a href="{{ route('events.create')}}" class="btn btn-success btn-sm">Adaugă</a>
    </div>
@stop

@section('content')
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titlu</th>
        <th scope="col">Descriere</th>
        <th scope="col">Imagine</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      {{-- @forelse ($slideshows as $slideshow)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $slideshow->title }}</td>
            <td>{{ $slideshow->description }}</td>
            <td>
              <img class="w-25" src="img/uploads/slideshow/{{ $slideshow->image }}" alt="{{ $slideshow->title }}">
            </td>
            <td>
                <a href="{{ route('slideshows.edit', [ 'slideshow'=>$slideshow->id ])}}" 
                   class="btn btn-sm text-white btn-warning">Edit</a>
                <a href="{{ route('slideshows.destroy', [ 'slideshow' => $slideshow->id ]) }}" 
                   class="btn btn-sm text-white btn-danger">Delete</a>
            </td>
        </tr>
      @empty
          <p>Nu sunt slideshow-uri in baza de date</p>
      @endforelse --}}
    </tbody>
  </table>
@stop

@section('css')
    <style>
      .img-box{
        width: 50px;
      }
    </style>
@stop

@section('js')

@stop