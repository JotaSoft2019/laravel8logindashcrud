@extends('adminlte::page')

@section('title', 'Logistica')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')

    <p>{{ $recomendacion }}</p>
    <p>Hora actual: {{ $hora_actual }}</p>
@stop