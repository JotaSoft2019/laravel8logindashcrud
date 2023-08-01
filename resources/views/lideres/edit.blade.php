@extends('adminlte::page')

@section('title', 'Lideres')

@section('content_header')
    <h1>Editar Lider</h1>
@stop

@section('content')
   <form action="/lideres/{{$lideres->id}}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$lideres->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="text" class="form-control" value="{{$lideres->apellido}}">
  </div>
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" value="{{$lideres->area}}">
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($lideres->imagen)
        <div>
            <img src="{{ asset('storage/'.$lideres->imagen) }}" alt="Imagen del líder" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>
  <a href="/lideres" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop