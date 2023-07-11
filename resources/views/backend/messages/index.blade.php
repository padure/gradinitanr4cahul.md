@extends('adminlte::page')

@section('title', env('APP_NAME', 'Mesaje contacte'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Mesaje vizitatori</h1>
    </div>
@stop

@section('content')
<table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nume</th>
        <th scope="col">Telefon</th>
        <th scope="col">Subiect</th>
        <th scope="col">Mesajul</th>
        <th scope="col">Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($messages as $message)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->subject }}</td>
            <td>{{ $message->message }}</td>
            <td>
                <form style="display: inline;"
                  action="{{ route('messages.destroy', [ 'message' => $message->id ]) }}"
                  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
      @empty
          <tr>
            <td colspan="3"><p>Nu sunt mesaje in baza de date</p></td>
          </tr>
      @endforelse
    </tbody>
  </table>
@stop

@section('css')
    
@stop

@section('js')

@stop