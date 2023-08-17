@extends('adminlte::page')

@section('title', 'Reconocimiento')

@section('content_header')
    <h1>Reconocimientos</h1>
@stop

@section('content')

<div class="contenedor-reco">
   <a href="reconocimientos/create" class="btn btn-outline-success">CREAR</a>
   
   <div class="row container">
       @foreach ($reconocimientos as $reconocimiento) 
           <div class="card card-principal">
               <div class="text-center card-2">
                   @if ($reconocimiento->imagen)
                   <div class="imagen-area">
                       <img src="{{ asset('storage/' . $reconocimiento->imagen) }}" class="card-img-top" alt="Imagen">
                   </div>
                   @else
                       <div class="text-center">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   <div class="informacion">
                       <div class="text-center compra-area">
                           <span class="title-compra">{{ $reconocimiento->nombre }}</span> 
                       </div>
                       <div class="text-center compra-area">
                           <span class="title-compra">{{ $reconocimiento->fecha }}</span> 
                       </div>
                       <div class="text-center compra-area">
                           <span class="title-compra">{{ $reconocimiento->descripcion }}</span> 
                       </div>
                       <div class="text-center compra-area">
                           <span class="title-compra">{{ $reconocimiento->area }}</span> 
                       </div>
                       <div class="text-center compra-area"> 
                    <span class="card-text">
                       @if($reconocimiento->estrella)
                     <i class="fas fa-star fa-lg" style="color: gold;"></i>
                     <i class="fas fa-star fa-lg" style="color: gold;"></i>
                     <i class="fas fa-star fa-lg" style="color: gold;"></i>
                      @endif
                    </span> 
                     </div>
                  
                   <div class="compras-footer">
                       <form action="{{ route('reconocimientos.destroy', $reconocimiento->id) }}" method="POST">
                           <a href="/reconocimientos/{{ $reconocimiento->id }}/edit" class="btn btn-outline-warning">Editar</a>
                           
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger">Borrar</button>
                       </form>
                   </div>
               </div>

               <br>
           </div>
           <br>
       @endforeach
   </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reconocimientos.css') }}">
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