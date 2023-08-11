@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
    <h1>Contabilidad</h1>
@stop

@section('content')
   <a href="{{ route('contabilidads.create') }}" class="btn btn-outline-success">CREAR</a>
   
   <div class="row container">
       @foreach ($contabilidads as $contabilidad) 
           <div class="card card-principal">
               <div class="text-center card-2">
                   @if ($contabilidad->imagen)
                   <div class="card imagen-area">
                   <img src="{{ asset('storage/' . $contabilidad->imagen) }}" class="card-img-top" alt="Imagen">
                   </div>
                       
                   @else
                       <div class="text-center">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   <div class="informacion">
                   <div class="text-center compra-area">
                       <h5 class="title-compra">{{ $contabilidad->area }}</h5>  
                   </div>
                   <div class="text-center compra-area">
                       <p class="card-text">{{ $contabilidad->lema }}</p> 
                   </div>

                   </div>
                   
                   <div class="compras-footer">
                       <form action="{{ route('contabilidads.destroy', $contabilidad->id) }}" method="POST">
                           <a href="{{ route('contabilidads.edit', $contabilidad->id) }}" class="btn btn-outline-warning">Editar</a>
                           
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-danger">Borrar</button>
                       </form>
                   </div>
               </div>
           </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contabilidad.css') }}">
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