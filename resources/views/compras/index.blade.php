@extends('adminlte::page')

@section('title', 'Compras Nacionales')

@section('content_header')
    <h1>Area Compras Nacionales</h1>
@stop

@section('content')
   <a href="compras/create" class="btn btn-outline-success">CREAR</a>
   
   <div class="row">
       @foreach ($compras as $compra) 
           <div class="card">
               <div class="text-center">
               <div class="card text-center compra-area">
                       <h5 class="title-compra">{{ $compra->area }}</h5> 
                   </div>
                   @if ($compra->imagen)
                   <div class="imagen-area">
                   <img src="{{ asset('storage/' . $compra->imagen) }}" class="card-img-top" alt="Imagen">

                   </div>
                   @else
                       <div class="text-center"> 
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   
                   <div class="card text-center compra-area"> 
                       <p class="card-text">{{ $compra->lema }}</p> 
                   </div>
                   <div class="card-body compras-footer">
                       <form action="{{ route('compras.destroy', $compra->id) }}" method="POST">
                           <a href="/compras/{{ $compra->id }}/edit" class="btn btn-outline-warning">Editar</a>
                           
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger">Borrar</button>
                           
                   </div>
               </div>
           </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#comprasNacionales').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
});
</script>
@stop