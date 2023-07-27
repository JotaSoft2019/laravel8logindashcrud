@extends('adminlte::page')

@section('title', 'Comercial')

@section('content_header')
    <h1>Comercial</h1>
@stop

@section('content')
   <form action="{{ route('comercials.update', $comercials->id) }}" method="POST" enctype="multipart/form-data">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="area" class="form-label">Area</label>
    <input id="area" name="area" type="text" class="form-control" value="{{$comercials->area}}">    
  </div>
  <div class="mb-3">
    <label for="lema" class="form-label">Lema</label>
    <input id="lema" name="lema" type="text" class="form-control" value="{{$comercials->lema}}">
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    @if ($comercials->imagen)
        <div>
            <img src="{{($comercials->imagen_url)}}" alt="Imagen del líder" style="width: 200px;">
        </div>
    @endif
    <input id="imagen" name="imagen" type="file" class="form-control">
  </div>
  <a href="/comercials" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop