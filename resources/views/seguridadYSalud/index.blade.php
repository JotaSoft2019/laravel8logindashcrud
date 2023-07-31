@extends('adminlte::page')

@section('title', 'Seguridad y Salud')

@section('content_header')
    <h1>Seguridad y Salud</h1>
@stop

@section('content')
<a href="{{ route('seguridadYSalud.create') }}" class="btn btn-outline-success">CREAR</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Descargar Archivos</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('seguridadYSalud.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('seguridadYSalud.download') }}" class="btn btn-primary">Descargar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Mostrar el PDF si ya se ha creado --}}
    @if ($archivo)
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>PDF existente</h4>
                    </div>
                    <div class="card-body">
                    <embed src="{{ asset('/' . $archivo->urlpdf) }}" width="100%" height="200" type="application/pdf">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@stop
















