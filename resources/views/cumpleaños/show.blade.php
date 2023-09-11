@extends('adminlte::page')

@section('title', 'Cumpleaños')

@section('content_header')
    
@stop


@section('content')
<div class="container">
    <h1>Detalles del Evento de Cumpleaños</h1>
    <p><strong>Nombre:</strong> {{ $cumpleanio->nombre }}</p>
    <p><strong>Fecha de Cumpleaños:</strong> {{ $cumpleanio->fecha->format('d/m/Y') }}</p>
</div>
@endsection