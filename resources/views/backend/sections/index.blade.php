@extends('adminlte::page')

@section('title', env('APP_NAME', 'Categorii cadrul legislativ și normativ'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Categorii cadrul legislativ și normativ</h1>
        <a href="{{ route('sections.create')}}" class="btn btn-success btn-sm">Adaugă</a>
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
      @forelse ($sections as $section)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $section->nume }}</td>
            <td>
                <a href="{{ route('sections.edit', [ 'section'=>$section->id ])}}" 
                   class="btn btn-sm text-white btn-warning">Edit</a>
                <form style="display: inline;"
                  action="{{ route('sections.destroy', [ 'section' => $section->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                  
            </td>
        </tr>
      @empty
          <tr>
            <td colspan="3"><p>Nu sunt categorii in baza de date</p></td>
          </tr>
      @endforelse
    </tbody>
  </table>
@stop

@section('css')
    
@stop

@section('js')

@stop