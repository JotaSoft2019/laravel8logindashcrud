@extends('adminlte::page')

@section('title', 'Agregar Evento')

@section('content_header')
   <h1>Agregar Evento</h1>
@stop

@section('content')
<form action="{{ route('calendario.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <!-- Agregar campos del evento -->
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
    <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" rows="3" tabindex="3"></input>
  </div>

  <div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha fin</label>
    <input id="fecha_fin" name="fecha_fin" type="date" class="form-control" rows="3" tabindex="3"></input>
  </div>
  
  <a href="{{ route('calendario.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button> <!--Aca debo crear una ruta que me lleve o me cree el acceso a que se guarde en el calendario-->
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')  
@stop