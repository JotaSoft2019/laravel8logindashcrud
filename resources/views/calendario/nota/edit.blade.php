@extends('adminlte::page')

@section('title', 'Editar Comentario')

@section('content_header')
    <h1>Editar Comentario</h1>
@stop

@section('content')
<div class="col-md-6">
    <form action="{{ route('calendario/nota.update', $nota->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="noteTitle" class="form-label">Título de la nota</label>
            <input id="noteTitle" name="title" type="text" class="form-control" value="{{$nota->title}}">
        </div>
        <div class="mb-3">
            <label for="noteColor" class="form-label">Color de la nota</label>
            <input id="noteColor" name="color" type="color" class="form-control" value="{{$nota->color}}">
        </div>
        <div class="mb-3">
            <label for="noteContent" class="form-label">Contenido de la nota</label>
            <textarea id="noteContent" rows="3" name="contenido" class="form-control">{{$nota->contenido}}</textarea>
        </div>
        <div class="d-flex">
            <a href="/comercials" class="btn btn-secondary mr-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
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