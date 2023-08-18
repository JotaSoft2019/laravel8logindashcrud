@extends('adminlte::page')

@section('title', 'Sistemas E inventario')

@section('content_header')
    <h1>Sistemas E inventario</h1>
@stop

@section('content')
   <a href="{{ route('inventario.create') }}" class="btn btn-outline-success">CREAR</a>
   
   <div id="container">
       @foreach ($inventarios as $inventario) 
           <div class="product-details">
              <h1>{{ $inventario->area }}</h1> 
              <p class="information">{{ $inventario->lema }}</p> 
           </div>

               <div class="product-image">
                   @if ($inventario->imagen)
                   <img src="{{ asset('storage/' . $inventario->imagen) }}" class="card-img-top" alt="Imagen">  
                   @else
                       <div class="text-center">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
               </div>

                  <br>
                   <div class="compras-footer">
                       <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST">
                           <a href="{{ route('inventario.edit', $inventario->id) }}" class="btn btn-outline-warning">Editar</a>
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger">Borrar</button>
                       </form>
                   </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sistemas.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

@stop