@extends('adminlte::page')

@section('title', 'Cumpleaños')

@section('content_header')
    
@stop


@section('content')
<div class="container">
    <h1>Editar Evento de Cumpleaños</h1>
    <form action="{{ route('cumpleaños.update', $cumpleanio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $cumpleanio->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha de Cumpleaños:</label>
            <input type="date" name="fecha" class="form-control" value="{{ $cumpleanio->fecha->format('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection