@extends('adminlte::page')

@section('title', 'Seguridad y Salud')

@section('content_header')
    <h1>Seguridad y Salud</h1>
@stop

@section('content')
<form action="{{ route('seguridad.update', $seguridad->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="area" value="{{ $seguridad->area }}">
    <input type="file" name="imagen" accept="image/*">
    <input type="text" name="titulo" value="{{ $seguridad->titulo }}">
    <textarea name="parrafo">{{ $seguridad->parrafo }}</textarea>
    <input type="file" name="pdf" accept=".pdf">
    <button type="submit">Actualizar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop