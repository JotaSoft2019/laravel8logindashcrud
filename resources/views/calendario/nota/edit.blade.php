@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Editar Comentario</h1>
@stop

@section('content')
   <form action="{{ route('nota.update', $nota->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Titulo Nota</label>
    <input id="title" name="contenido" type="text" class="form-control" value="{{$nota->title}}">    
  </div>
  <div class="mb-3">
    <label for="contenido" class="form-label">Descripcion</label>
    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3" value="{{$nota->descripcion}}"></textarea>    
  </div>
  <div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <input id="color" name="color" type="color" class="form-control" value="{{$nota->color}}">    
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

