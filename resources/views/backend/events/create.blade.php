@extends('adminlte::page')

@section('title', env('APP_NAME', 'AdminLTE'))

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Adaugă Eveniment</h1>
        <a href="{{ route('events.index')}}" class="btn btn-dark btn-sm">Înapoi</a>
    </div>
@stop

@section('content')
<textarea name="event" id="blog_construct"></textarea>
@stop

@section('css')
    
@stop

@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#blog_construct'
  });
</script>
@stop