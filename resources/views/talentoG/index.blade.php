@extends('adminlte::page')

@section('title', 'Talento Humano Y Gerencia')

@section('content_header')
    <h1>Talento Humano Y Gerencia</h1>
@stop

@section('content')
    @can('talento.create')
       <a href="{{ route('talento.create') }}" class="btn btn-outline-success">CREAR</a>
    @endcan

<div class="container">
    {{-- Mostrar el PDF si ya se ha creado --}}
    @if ($archivos && $archivos->count() > 0)
    <div class="row justify-content-center mt-4">
        @foreach ($archivos as $archivo)
            <!-- Mostrar cada archivo en una card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-title">{{ $archivo->titulo }}</h5>
                    </div>
                    
                    <div class="card-body">
                        <embed src="{{ asset('storage/' . $archivo->urlpdf) }}" width="100%" height="200" type="application/pdf">
                    </div>
                    <div class="card text-center">
                       <p class="card-text">{{ $archivo-> text}}</p>
                   </div>
                   @can('talento.destroy')
                    <div class="card-footer">
                        <form action="{{ route('talento.destroy', $archivo->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Borrar</button>
                            <a href="{{ route('talento.edit', $archivo->id) }}" class="btn btn-outline-warning">Editar</a>
                        </form>
                    </div>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
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















