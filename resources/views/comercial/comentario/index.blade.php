@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')

   <!-- Display existing comments -->
   @foreach ($comentarios as $comentario)
   <div class="cuadro-comentario">
      <p>{{$comentario->contenido}}</p>
      @endforeach
   </div>
   
   <br>

   <!-- Add a form for users to add new comments -->
   <form  action="{{ route('comentario.store') }} " method="POST">
       <!--@csrf
       <div class="form-group">
           <label for="contenido">Agregar comentario:</label>
           <textarea name="contenido" id="contenido" class="form-control" rows="3"></textarea>
           @error('contenido')
               <div class="text-danger">{{ $message }}</div>
           @enderror
       </div>
       <button type="submit" class="btn btn-outline-warning">Enviar comentario</button>-->
       <a href="{{ route('comercials.index') }}" class="btn btn-outline-success">Volver</a>
   </form>

   
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')
    <!-- Add specific scripts for comments here if necessary -->
@stop