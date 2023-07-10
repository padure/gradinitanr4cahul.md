@extends('adminlte::page')

@section('title', env('APP_NAME', 'Meniul zilei'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Meniul zilei</h1>
        @if ($menus->isEmpty())
          <a href="{{ route('menus.create')}}" class="btn btn-success btn-sm">Adaugă</a>
        @endif
    </div>
@stop

@section('content')
<div class="col-12">
  @if(session('success'))
    <div class="alert alert-success text-white">
        {{ session('success') }}
    </div>
  @endif
  @if(session('warning'))
    <div class="alert alert-warning text-white">
        {{ session('warning') }}
    </div>
  @endif
  @if(session('danger'))
    <div class="alert alert-danger text-white">
        {{ session('danger') }}
    </div>
  @endif
</div>
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nume</th>
        <th scope="col">Descriere</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($menus as $menu)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
              <a href="{{ asset(env('UPLOADS_MENU') . $menu->file) }}" class="btn btn-link" target="_blanck">{{ $menu->nume }}</a>
            </td>
            <td>{{ $menu->descriere }}</td>
            <td class="w-25">
                <a href="{{ route('menus.edit', [ 'menu'=>$menu->id ])}}" class="btn btn-warning btn-sm text-white">
                  <i class="fas fa-edit"></i>
                </a>
                <form style="display: inline;"
                  action="{{ route('menus.destroy', [ 'menu' => $menu->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
            </td>
        </tr>
      @empty
          <tr>
            <td colspan="4"><p>Baza de date nu conține niciun meniu</p></td>
          </tr>
      @endforelse
    </tbody>
  </table>
@stop

@section('css')
    <style>
      a{
        display: inline;
      }
    </style>
@stop

@section('js')

@stop