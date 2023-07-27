@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')

   <!-- Display existing comments -->
   @foreach ($comentarios as $comentario)
   
    <p>Comentario: {{$comentario->contenido}}</p>
  @endforeach

   <!-- Add a form for users to add new comments -->
   <form  action="{{ route('comentario.store') }} " method="POST">
       @csrf
    
       <div class="form-group">
           <label for="contenido">Agregar comentario:</label>
           <textarea name="contenido" id="contenido" class="form-control" rows="3"></textarea>
           @error('contenido')
               <div class="text-danger">{{ $message }}</div>
           @enderror
       </div>
       <button type="submit" class="btn btn-primary">Enviar comentario</button>
   </form>

   <a href="{{ route('comercials.index') }}" class="btn btn-secondary">Volver</a>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Add specific styles for comments here if necessary -->
@stop

@section('js')
    <!-- Add specific scripts for comments here if necessary -->
@stop