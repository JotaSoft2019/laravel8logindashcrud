@extends('adminlte::page')

@section('title', 'Comentario')

@section('content_header')
   <h1>Mensaje Felicitaciones</h1>
@stop

@section('content')
<form action="{{ route('mensaje.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <!-- Agregar comentarios -->
  <div class="mb-3">
    <label for="contenido" class="form-label">Felicitaciones</label>
    <textarea id="contenido" name="contenido" class="form-control" rows="3" tabindex="3"></textarea>
  </div>
  
  <a href="/cumpleaños" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

@stop

@section('js')  
@stop