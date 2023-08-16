@extends('adminlte::page')

@section('title', 'Gerencia')

@section('content_header')
    <h1>Editar Gerencia</h1>
@stop

@section('content')

<form action="{{ route('reconocimientos.update', $reconocimientos->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $reconocimientos->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="fecha" class="form-label">Fecha de Reconocimiento</label>
    <input id="fecha" name="fecha" type="date" class="form-control" value="{{ $reconocimientos->fecha}}">    
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{ $reconocimientos->descripcion }}">    
  </div>
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" value="{{ $reconocimientos->area }}">    
  </div>
  
  <div class="mb-3">
    <label for="estrella" class="form-label">Estrellas</label>
    <input id="estrella" name="estrella" type="text" class="form-control" value="{{ $reconocimientos->estrella }}">
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($reconocimientos->imagen)
        <div>
            <img src="{{($reconocimientos->imagen_url) }}" alt="Imagen de la compra" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>

  <a href="/reconocimientos" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop