@extends('adminlte::page')

@section('title', 'Recomendaciones de salud')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')

<div class="card">
    <div class="container">
         <form action="{{ route('recomendaciones.store') }}"method="POST"> 
             @csrf
             <div class="informacion-edit">
                 <label for="recomendacion">Escribe la recomendación:</label>
                 <input type="text"id="texto" name="texto"required>
                 <button type="submit"class="btn btn-primary">Agregar Recomendación</button> 
             </div>
         </form>
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/recomendacion.css') }}">
@stop
