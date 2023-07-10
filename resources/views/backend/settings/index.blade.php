@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Profilul gradiniței</h1>
        @if ( $settings->isEmpty() )
          <a href="{{ route('settings.create')}}" class="btn btn-success btn-sm">Adaugă</a>
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
        {{ session('delete') }}
    </div>
  @endif
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nume director</th>
        <th scope="col">Strada</th>
        <th scope="col">Telefon</th>
        <th scope="col">Email</th>
        <th scope="col">Twitter</th>
        <th scope="col">Facebook</th>
        <th scope="col">Youtube</th>
        <th scope="col">Linkedin</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($settings as $setting)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $setting->director }}</td>
            <td>{{ $setting->str }}</td>
            <td>{{ $setting->tf }}</td>
            <td>{{ $setting->email }}</td>
            <td>{{ $setting->twitter??"Nu sunt date" }}</td>
            <td>{{ $setting->facebook??"Nu sunt date" }}</td>
            <td>{{ $setting->youtube??"Nu sunt date" }}</td>
            <td>{{ $setting->linkedin??"Nu sunt date" }}</td>
            <td class="w-25">
                <a href="{{ route('settings.edit', [ 'setting'=>$setting->id ])}}" 
                   class="btn btn-warning btn-sm text-white">
                   Edit 
                </a>
                <form style="display: inline;"
                  action="{{ route('settings.destroy', [ 'setting' => $setting->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
      @empty
          <tr>
            <td colspan="10"><p>Nu sunt informatii in baza de date</p></td>
          </tr>
      @endforelse
    </tbody>
  </table>
  <div class="col-md-12 my-4">
    <div class="d-flex justify-content-center">
        {{ $settings->links() }}
    </div>
</div>
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