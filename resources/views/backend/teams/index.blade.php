@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Membrii echipei noastre</h1>
        <a href="{{ route('teams.create')}}" class="btn btn-success btn-sm">Adaugă</a>
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
        <th scope="col">Functie</th>
        <th scope="col">Imagine</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($members as $member)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $member->nume }}</td>
            <td>{{ $member->functie }}</td>
            <td>
              <img src="{{ asset(env('UPLOADS_MEMBER').$member->img) }}" alt="{{ $member->nume }}" class="w-25">
            </td>
            <td class="w-25">
                <a href="{{ route('teams.edit', [ 'team'=>$member->id ])}}" 
                   class="btn btn-warning btn-sm text-white">
                   <i class="fas fa-edit"></i> 
                </a>
                <form style="display: inline;"
                  action="{{ route('teams.destroy', [ 'team' => $member->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
      @empty
        <tr>
          <td colspan="5"><p>Nu sunt membri in baza de date</p></td>
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