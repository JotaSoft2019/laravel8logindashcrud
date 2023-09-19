@extends('adminlte::page')

@section('title', 'Lideres')

@section('content_header')
   <h1>Crear nuevo líder</h1>
@stop

@section('content')
<form action="{{ route('lideres.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen" class="form-control">
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2">
    </div>

    <div class="mb-3">
        <label for="area" class="form-label">Área</label>
        <select id="area" class="form-control" name="area">
              <option value="Compras Nacionales"{{ in_array('comprasNacionales', old('area', [])) ? ' selected' : '' }}>Compras Nacionales</option>
              <option value="Contaibilidad"{{ in_array('contaibilidad', old('area', [])) ? ' selected' : '' }}>Contabilidad</option>
              <option value="Comercial"{{ in_array('comercial', old('area', [])) ? ' selected' : '' }}>Comercial</option>
              <option value="Comex"{{ in_array('comex', old('area', [])) ? ' selected' : '' }}>Comex</option>
              <option value="Gerencia"{{ in_array('gerencia', old('area', [])) ? ' selected' : '' }}>Gerencia</option>
              <option value="Mercadeo Y Comunicaciones"{{ in_array('mercadeo', old('area', [])) ? ' selected' : '' }}>Mercadeo Y Comunicaciones</option>
              <option value="Sistemas E Inventario"{{ in_array('sistemas', old('area', [])) ? ' selected' : '' }}>Sistemas E Inventario</option>
              <option value="Talento Humano"{{ in_array('talentoHumano', old('area', [])) ? ' selected' : '' }}>Talento Humano</option>
              <option value="Logistica"{{ in_array('logistica', old('area', [])) ? ' selected' : '' }}>Logistica</option>
              </select>
    </div>

    <a href="/lideres" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@stop

@section('js')  
@stop