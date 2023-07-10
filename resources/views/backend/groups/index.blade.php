@extends('adminlte::page')

@section('title', env('APP_NAME', 'Grupele noastre'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Grupele noastre</h1>
        <a href="{{ route('groups.create')}}" class="btn btn-success btn-sm">Adaugă</a>
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
        <th scope="col">Educator</th>
        <th scope="col">Functie</th>
        <th scope="col">Avatar</th>
        <th scope="col">Imagine</th>
        <th scope="col">Varsta</th>
        <th scope="col">Ora</th>
        <th scope="col">Capacitate</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($groups as $group)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $group->nume }}</td>
            <td>{{ $group->educator }}</td>
            <td>{{ $group->functie }}</td>
            <td>
              <img src="{{ asset(env('UPLOADS_GROUP').$group->avatar) }}" alt="{{ $group->avatar }}" class="w-100">
            </td>
            <td>
              <img src="{{ asset(env('UPLOADS_GROUP').$group->img) }}" alt="{{ $group->img }}" class="w-25">
            </td>
            <td>{{ $group->varsta }}</td>
            <td>{{ $group->ora }}</td>
            <td>{{ $group->capacitate }}</td>
            <td class="w-25">
                <a href="{{ route('groups.edit', [ 'group'=>$group->id ])}}" 
                   class="btn btn-warning btn-sm text-white">
                   <i class="fas fa-edit"></i> 
                </a>
                <form style="display: inline;"
                  action="{{ route('groups.destroy', [ 'group' => $group->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
      @empty
        <tr>
          <td colspan="10"><p>Nu sunt membri in baza de date</p></td>
        </tr>
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