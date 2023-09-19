@extends('adminlte::page')

@section('title', 'Logistica')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')

    <h1>Recomendaciones de Salud</h1>
    
    <h2>Recomendación del momento:</h2>
    <p>{{ $recomendacion }}</p>
    <p>Hora actual: {{ $hora_actual }}</p>
@stop