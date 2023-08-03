@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
   @foreach ($events as $event)
   <div class="cuadro-comentario">
      <p>{{$event->titulo}}</p>
      <p>{{$event->descripcion}}</p>
      <p>{{$event->fecha_inicio}}</p>
      <p>{{$event->fecha_fin}}</p>
      @endforeach
   </div>
   <br>
   <form  action="{{ route('eventos.store') }} " method="POST">
       <a href="{{ route('calendario.index') }}" class="btn btn-outline-success">Volver</a>
   </form>

   
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
@stop

@section('js')
    
@stop