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
   <div class="container-fluid"> {{-- Add container-fluid class --}}
       <div class="row">
           @foreach ($comercials as $comercial) 
               <div class="card w-75 card-compras">
                   <div class="text-center">
                   <div class="card text-center compra-area">
                       <h5 class="title-compra">{{ $comercial->area }}</h5> 
                   </div>
                       @if ($comercial->imagen)
                           <img src="{{ asset('/imagenesJotaRed/Equipo Comercial 1.jpg') }}"class="card-img-top" alt="Imagen" style="width: 60%; height: 50%; margin-left:150px; margin-top:20px; border-radius:20px 20px 20px 20px;">
                       @else
                           <div class="text-center" style="height: 200px; background-color: white; display: flex; align-items: center; justify-content: center;">
                               <span class="align-middle">Sin imagen</span>
                           </div>
                       @endif
                       <div class="card text-center compra-area"> 
                           <p class="card-text">{{ $comercial->lema }}</p> 
                       </div>
                       <div class="card-body comercial-footer">
                           <form action="{{ route('comercials.destroy', $comercial->id) }}" method="POST">
                               <a href="/comercials/{{ $comercial->id }}/edit" class="btn btn-outline-warning">Editar</a>
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-outline-danger">Borrar</button>
                           </form>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
    $('#lideres').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
});
</script>
@stop