@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Editar Comentario</h1>
@stop

@section('content')
   <form action="{{ route('comercials/comentario.update', $comentario->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="contenido" class="form-label">Comentario</label>
    <input id="contenido" name="contenido" type="text" class="form-control" value="{{$comentario->comentario}}">    
  </div>
  <a href="/comercials" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')  
@stop






