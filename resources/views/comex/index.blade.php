@extends('adminlte::page')

@section('title', 'Comex')

@section('content_header')
    <h1>Comex</h1>
@stop

@section('content')
   <a href="comex/create" class="btn btn-outline-success">CREAR</a>
   
   <div class="row">
       @foreach ($comexs as $comex) 
           <div class="card w-75 card-compras">
               <div class="text-center">
               <div class="card text-center compra-area">
                       <h5 class="title-compra">{{ $comex->area }}</h5> 
                   </div>
                   @if ($comex->imagen)
                       <img src="{{ asset('storage/' . $comex->imagen) }}" class="card-img-top" alt="Imagen" style="width: 60%; height: 60%; margin-left:120px; margin-top:20px; border-radius:20px 20px 20px 20px;">
                   @else
                       <div class="text-center" style="height: 400px; background-color: #eee; display: flex; align-items: center; justify-content: center;">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   
                   <div class="card text-center compra-area"> 
                       <p class="card-text">{{ $comex->lema }}</p> 
                   </div>
                   <div class="card-body compras-footer">
                       <form action="{{ route('comex.destroy', $comex->id) }}" method="POST">
                           <a href="/comex/{{ $comex->id }}/edit" class="btn btn-outline-warning">Editar</a>
                           
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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