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
                        <div class="mb-3">
                        <label for="" class="form-label">Titulo</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" tabindex="1">    
                        </div>
                        <div class="form-group">
                            <label for="urlpdf">Selecciona un archivo PDF</label>
                            <input type="file" class="form-control-file" name="urlpdf" id="urlpdf" accept=".pdf">
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Descripción</label>
                        <input id="text" name="text" type="textarea" class="form-control" tabindex="3">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Subir PDF</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
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
