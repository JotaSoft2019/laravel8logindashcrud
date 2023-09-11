@extends('adminlte::page')

@section('title', 'Cumpleaños')

@section('content_header')
    
@stop


@section('content')
<div class="container">
    <h1>Agregar Evento de Cumpleaños</h1>
    <form action="{{ route('cumpleaños.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha de Cumpleaños:</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection