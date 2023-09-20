@extends('adminlte::page')

@section('title', 'Recomendaciones de salud')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')
<div class="container">
    <h1>Agregar Recomendación de Salud</h1>
    <form action="{{ route('recomendaciones.store') }}" method="POST"> 
        @csrf
        <label for="recomendacion">Recomendación:</label>
        <input type="text" id="texto" name="texto" required> 
        <button type="submit" class="btn btn-primary">Agregar Recomendación</button> 
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/recomendacion.css') }}">
@stop

@section('js')
    
@stop