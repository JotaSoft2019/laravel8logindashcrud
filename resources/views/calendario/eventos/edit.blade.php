@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Editar Comentario</h1>
@stop

@section('content')
   <form action="{{ route('calendario/event.update', $events->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')
   <div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input id="titulo" name="titulo" class="form-control" rows="3" tabindex="3"></input>
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3"></input>
  </div>


  <div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
    <input id="fecha_inicio" name="fecha_inicio" class="form-control" rows="3" tabindex="3"></input>
  </div>

  <div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha fin</label>
    <input id="fecha_fin" name="fecha_fin" class="form-control" rows="3" tabindex="3"></input>
  </div>
  <a href="/calendario" class="btn btn-secondary">Cancelar</a>
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