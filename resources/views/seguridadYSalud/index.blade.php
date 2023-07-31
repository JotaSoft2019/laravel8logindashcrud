@extends('adminlte::page')

@section('title', 'Seguridad y Salud')

@section('content_header')
    <h1>Seguridad y Salud</h1>
@stop

@section('content')
<a href="{{ route('seguridadYSalud.create') }}" class="btn btn-outline-success">CREAR</a>
<div class="container">
    {{-- Mostrar el PDF si ya se ha creado --}}
    @if ($archivos && $archivos->count() > 0)
    <div class="row justify-content-center mt-4">
        @foreach ($archivos as $archivo)
            <!-- Mostrar cada archivo en una card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>PDF existente</h4>
                    </div>
                    <div class="card-body">
                        <embed src="{{ asset('storage/' . $archivo->urlpdf) }}" width="100%" height="200" type="application/pdf">
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('seguridadYSalud.destroy', $archivo->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Borrar</button>
                            <a href="{{ route('seguridadYSalud.edit', $archivo->id) }}" class="btn btn-outline-warning">Editar</a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>x
@else
    <p>No hay PDF disponibles.</p>
@endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</div>
@stop















