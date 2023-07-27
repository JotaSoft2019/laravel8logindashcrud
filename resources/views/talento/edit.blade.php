@extends('adminlte::page')

@section('title', 'Talento Humano')

@section('content_header')
    <h1>Talento Humano</h1>
@stop

@section('content')

<form action="{{ route('talentoHumano.update', $talentosHumanos->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')

  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" value="{{ $talentosHumanos->area }}">    
  </div>
  
  <div class="mb-3">
    <label for="lema" class="form-label">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control" value="{{ $talentosHumanos->lema }}">
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($talentosHumanos->imagen)
        <div>
            <img src="{{ $talentosHumanos->imagen_url }}" alt="Imagen de la compra" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>

  <a href="/talentosHumanos" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop