@extends('adminlte::page')

@section('title', 'Comex')

@section('content_header')
   <h1>Comex</h1>
@stop

@section('content')
<form action="{{ route('comex.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" tabindex="1">    
  </div>
  
  <div class="mb-3">
    <label for="lema" class="form-label">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control" tabindex="2">
  </div>
  
  <a href="/comex" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@stop

@section('js')  
@stop