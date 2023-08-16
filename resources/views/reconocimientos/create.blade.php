@extends('adminlte::page')

@section('title', 'Reconocimientos')

@section('content_header')
   <h1>Reconocimientos</h1>
@stop

@section('content')
<form action="{{ route('reconocimientos.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha de Reconocimiento</label>
    <input id="fecha" name="fecha" type="date" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" tabindex="1">    
  </div>
  
  <div class="mb-3">
    <label for="estrella" class="form-label">Estrella</label>
    <input id="estrella" name="estrella" type="text" class="form-control" tabindex="2">
  </div>
  
  <a href="/reconocimientos" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@stop

@section('js')  
@stop