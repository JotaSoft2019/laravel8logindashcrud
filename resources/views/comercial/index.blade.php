@extends('adminlte::page')

@section('title', 'Comercial')

@section('content_header')
    <h1>Area Comercial</h1>
@stop

@section('content')
   <a href="comercials/create" class="btn btn-primary mb-3">CREAR</a>
   <a href="comentario/create" class="btn btn-primary mb-3">CREAR COMENTARIO</a>
   <a href="comentario" class="btn btn-primary mb-3">VER COMENTARIO</a>
  
   <div class="container-fluid"> {{-- Add container-fluid class --}}
       <div class="row">
           @foreach ($comercials as $comercial) 
               <div class="card bg-dark text-white">
                   <div class="card bg-dark text-white">
                       @if ($comercial->imagen)
                           <img src="{{ asset('/imagenesJotaRed/Equipo Comercial 1.jpg') }}" class="card-img-top" alt="Imagen" style="height: 200px; ">
                       @else
                           <div class="text-center" style="height: 200px; background-color: white; display: flex; align-items: center; justify-content: center;">
                               <span class="align-middle">Sin imagen</span>
                           </div>
                       @endif
                       <div class="card-body">
                           <h5 class="card-title">{{ $comercial->area }}</h5> 
                           <p class="card-text">{{ $comercial->lema }}</p> 
                       </div>
                       <div class="card-footer">
                           <form action="{{ route('comercials.destroy', $comercial->id) }}" method="POST">
                               <a href="/comercials/{{ $comercial->id }}/edit" class="btn btn-info">Editar</a>
                               @csrf
                               @method('DELETE')
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