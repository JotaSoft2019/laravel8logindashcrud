@extends('adminlte::page')

@section('title', 'Comercial')

@section('content_header')
    <h1>Area Comercial</h1>
@stop

@section('content')
   <a href="comercials/create" class="btn btn-outline-warning">CREAR</a>
   <div class="botones-comentarios">
     <a href="comentario/create" class="btn btn-outline-success">CREAR COMENTARIO</a>
     <a href="comentario" class="btn btn-outline-success">VER COMENTARIOS</a>
   </div>
   <br>

   <div id="container"> 
   @foreach ($comercials as $comercial) 
       <div class="product-details">
         <h1>{{ $comercial->area }}</h1>
         <p class="information">{{ $comercial->lema }}</p>
        </div>
          
        <div class="product-image">
                @if ($comercial->imagen)
                           <img src="{{ asset('storage/' . $comercial->imagen) }}"class="card-img-top" alt="Imagen">
                       @else
                           <div class="text-center">
                               <span class="align-middle">Sin imagen</span>
                           </div>
                       @endif

        </div>
                       
                       <div class="compras-footer">
                           <form action="{{ route('comercials.destroy', $comercial->id) }}" method="POST">
                               <a href="/comercials/{{ $comercial->id }}/edit" class="btn btn-outline-warning">Editar</a>
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-outline-danger">Borrar</button>
                           </form>
                       </div>
           @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comercial.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
@stop