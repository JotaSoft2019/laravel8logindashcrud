@extends('adminlte::page')

@section('title', 'Gerencia')

@section('content_header')
    <h1>Editar Gerencia</h1>
@stop

@section('content')

<form action="{{ route('gerencia.update', $gerencias->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')

  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" value="{{ $gerencias->area }}">    
  </div>
  
  <div class="mb-3">
    <label for="lema" class="form-label">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control" value="{{ $gerencias->lema }}">
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($gerencias->imagen)
        <div>
            <img src="{{($gerencias->imagen_url) }}" alt="Imagen de la compra" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>

  <a href="/gerencia" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop