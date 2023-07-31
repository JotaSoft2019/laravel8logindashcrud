@extends('adminlte::page')

@section('title', 'Seguridad y Salud')

@section('content_header')
    <h1>Seguridad y Salud</h1>
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Subir archivo PDF</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('seguridadYSalud.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="urlpdf">Selecciona un archivo PDF</label>
                            <input type="file" class="form-control-file" name="urlpdf" id="urlpdf" accept=".pdf">
                            <br>
                            <a href="{{ route('seguridadYSalud.download') }}" class="btn btn-primary">Descargar</a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Subir PDF</button>
                            <button type="submit" class="btn btn-secondary">Ver PDF</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($archivo)
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>PDF existente</h4>
                </div>
                <div class="card-body">
                    <embed src="{{ asset('pdf/' . $archivo->urlpdf) }}" width="100%" height="600" type="application/pdf">
                </div>
            </div>
        </div>
    </div>
@endif
</div>
@stop

@section('css')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header h4 {
            margin: 0;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
@stop
