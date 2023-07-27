@extends('adminlte::page')

@section('title', 'Lideres')

@section('content_header')
   <h1>Crear nuevo lider</h1>
@stop

@section('content')

<form action="{{ route('lideres.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
                      <label for="imagen">Imagen</label>
                       <input type="file" name="imagen" id="imagen" class="form-control">
                      </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" tabindex="3">
  </div>
  
  <a href="/lideres" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@stop

@section('js')  
@stop