@extends('adminlte::page')

@section('title', env('APP_NAME', 'Cadrul legislativ și normativ'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Cadrul legislativ și normativ</h1>
        <a href="{{ route('laws.create')}}" class="btn btn-success btn-sm">Adaugă</a>
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
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($laws as $law)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $law->nume }}</td>
            <td class="w-25">
                <a href="{{ route('laws.edit', [ 'law'=>$law->id ])}}" 
                   class="btn btn-warning btn-sm text-white">
                   <i class="fas fa-edit"></i> 
                </a>
                <a href="{{ route('laws.show', [ 'law'=>$law->id ])}}" 
                  class="btn btn-info btn-sm text-white">
                  <i class="fas fa-eye"></i> 
               </a>
                <form style="display: inline;"
                  action="{{ route('laws.destroy', [ 'law' => $law->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
      @empty
          <tr>
            <td colspan="3"><p>Nu sunt file in baza de date</p></td>
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