@extends('adminlte::page')

@section('title', 'Agregar Comentario')

@section('content_header')
    <h1>Agregar Comentario</h1>
@stop

@section('content')
<div class="col-md-6">
    <form action="{{ route('nota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="noteTitle" class="form-label">Título de la nota</label>
            <input type="text" class="form-control" id="noteTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="noteColor" class="form-label">Color de la nota</label>
            <input type="color" class="form-control" id="noteColor" name="color">
        </div>
        <div class="mb-3">
            <label for="noteContent" class="form-label">Contenido de la nota</label>
            <textarea class="form-control" id="noteContent" name="contenido" rows="3"></textarea>
        </div>
        <div class="d-flex">
            <a href="/calendario" class="btn btn-secondary mr-2" tabindex="4">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Agregar Nota</button>
        </div>
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')
@stop