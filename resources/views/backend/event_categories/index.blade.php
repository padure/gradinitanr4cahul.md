@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Categorii</h1>
        <a href="{{ route('event-category.create')}}" class="btn btn-success btn-sm">Adaugă</a>
    </div>
@stop

@section('content')
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nume</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($event_categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->nume }}</td>
            <td>
                <a href="{{ route('event-category.edit', [ 'event_category'=>$category->id ])}}" 
                   class="btn btn-sm text-white btn-warning">Edit</a>
                <a href="{{ route('event-category.destroy', [ 'event_category' => $category->id ]) }}" 
                   class="btn btn-sm text-white btn-danger">Delete</a>
            </td>
        </tr>
      @empty
          <p>Nu sunt categorii in baza de date</p>
      @endforelse
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