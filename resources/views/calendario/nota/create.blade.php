@extends('adminlte::page')

@section('title', 'Nota')

@section('content_header')
   <h1>Agregar Nota</h1>
@stop

@section('content')
<form action="{{ route('nota.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Titulo Nota</label>
    <input id="title" name="title" class="form-control" rows="3" tabindex="3">
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion</label>
    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" tabindex="3"></textarea>
  </div>

  <div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <input type="color" id="color" name="color" class="form-control" rows="3" tabindex="3">
  </div>
  
  <a href="/calendario" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">

@stop

@section('js')  
@stop