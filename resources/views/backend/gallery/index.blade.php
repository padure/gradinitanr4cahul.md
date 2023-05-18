@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Galerie</h1>
        <a href="{{ route('gallery.create')}}" class="btn btn-success btn-sm">Adaugă</a>
    </div>
@stop

@section('content')
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Categorie</th>
        <th scope="col">Imagine</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->name }}</td>
            <td>
              @forelse ($category->images()->get() as $image)
                <img class="w-auto img-box" src="{{ env('UPLOADS_GALLERY').$image->image }}" alt="{{ $image->image }}">
              @empty
                <p>Nu sunt imagini</p>
              @endforelse
            </td>
            <td>
                <a href="{{ route('gallery.category.delete', [ 'gallery_category' => $category->id ]) }}" 
                   class="btn btn-sm text-white btn-danger">Delete</a>
            </td>
        </tr>
      @empty
      <tr>
        <th scope="row" colspan="4">
          <p>Nu sunt categorii</p>
        </th>
      </tr>
      @endforelse
    </tbody>
  </table>
@stop

@section('css')
    <style>
      .img-box{
        height: 80px;
        object-fit: cover;
        position: center center;
      }
      .w-auto{
        width: 15%!important;
      }
    </style>
@stop

@section('js')

@stop