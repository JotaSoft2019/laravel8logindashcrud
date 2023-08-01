@extends('adminlte::page')

@section('title', 'Mercadeo Y comunicaciones')

@section('content_header')
   <h1>Mercadeo Y comunicaciones</h1>
@stop

@section('content')
<form action="{{ route('mercadeo.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="area">Area</label>
    <input id="area" name="area" type="text" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="lema">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control">
  </div>
  
  <a href="{{ url('/mercadeo') }}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
@stop

@section('js')  
@stop
