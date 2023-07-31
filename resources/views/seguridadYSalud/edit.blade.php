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
                    <form action="{{ route('seguridadYSalud.update', $archivo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="urlpdf">Selecciona un archivo PDF</label>
                            <input type="file" class="form-control-file" name="urlpdf" id="urlpdf" accept=".pdf">
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
