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
      @forelse ($events as $event)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>
              <img src="{{ asset(env('UPLOADS_EVENT').$event->image) }}" alt="{{ $event->title }}">
            </td>
            <td class="w-25">
                <a href="{{ route('events.edit', [ 'event'=>$event->id ])}}" 
                   class="btn text-warning">
                   <i class="fas fa-edit"></i> 
                </a>
                <a href="{{ route('events.show', [ 'event'=>$event->id ])}}" 
                  class="btn text-dark">
                  <i class="fas fa-eye"></i>
                </a>
            </td>
        </tr>
      @empty
          <p>Nu sunt slideshow-uri in baza de date</p>
      @endforelse
    </tbody>
  </table>
@stop

@section('css')
    <style>
      td img{
        width: 150px;
      }
      a{
        display: inline;
      }
    </style>
@stop

@section('js')

@stop