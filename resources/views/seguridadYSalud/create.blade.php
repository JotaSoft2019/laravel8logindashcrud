@extends('adminlte::page')

@section('title', 'Seguridad y Salud')

@section('content_header')
   <h1>Seguridad y Salud</h1>
@stop

@section('content')
<form action="{{ route('seguridadYSalud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="area" placeholder="Area">
    <input type="file" name="imagen" accept="image/*">
    <input type="text" name="titulo" placeholder="Titulo">
    <textarea name="parrafo" placeholder="Parrafo"></textarea>
    <input type="file" name="pdf" accept=".pdf">
    <button type="submit">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminlte.css">
@endsection

@section('js')  
@endsection