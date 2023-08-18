@extends('adminlte::page')

@section('title', 'Editar Mercadeo y Comunicaciones')

@section('content_header')
    <h1>Editar Mercadeo y Comunicaciones</h1>
@stop

@section('content')
<form action="{{ route('mercadeo.update', $mercadeos->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')

  <div class="mb-3">
    <label for="area" class="form-label">Área</label>
    <input id="area" name="area" type="text" class="form-control" value="{{ old('area', $mercadeos->area) }}">    
  </div>
  
  <div class="mb-3">
    <label for="lema" class="form-label">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control" value="{{ old('lema', $mercadeos->lema) }}">
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($mercadeos->imagen)
        <div>
            <img src="{{ $mercadeos->imagen_url }}" alt="Imagen de la compra" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>

  <a href="{{ url('/mercadeo') }}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')  
@stop