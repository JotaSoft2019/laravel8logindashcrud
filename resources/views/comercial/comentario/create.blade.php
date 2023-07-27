@extends('adminlte::page')

@section('title', 'Comentario')

@section('content_header')
   <h1>Agregar comentarios</h1>
@stop

@section('content')
<form action="{{ route('comentario.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <!-- Agregar comentarios -->
  <div class="mb-3">
    <label for="contenido" class="form-label">Comentario</label>
    <textarea id="contenido" name="contenido" class="form-control" rows="3" tabindex="3"></textarea>
  </div>
  
  <a href="/comercials" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@stop

@section('js')  
@stop