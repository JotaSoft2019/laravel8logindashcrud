@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')
   @foreach ($comentarios as $comentario)
   <div class="cuadro-comentario">
      <p>{{ $comentario->contenido }}</p>
      <br>
      <form action="{{ route('comentario.destroy', ['comentario' => $comentario->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Eliminar</button>
      </form>
   @endforeach
   <form action="{{ route('comentario.store') }}" method="POST">
       <a href="{{ route('comercials.index') }}" class="btn btn-outline-success">Volver</a>
   </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')
@stop