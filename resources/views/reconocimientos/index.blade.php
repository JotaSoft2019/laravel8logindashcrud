@extends('adminlte::page')

@section('title', 'Reconocimiento')

@section('content_header')
    <h1>Reconocimientos</h1>
@stop

@section('content')

<div class="contenedor-reco">
   <a href="reconocimientos/create" class="btn btn-outline-success">CREAR</a>
     <div class="row container container-reconocimiento">
       @foreach ($reconocimientos as $reconocimiento) 
        <div class="card card-principal">
           <div class="contenedor-vacio">
             <div class="reconocimiento-img">
               <img src="{{ asset('/imagenesJotaRed/logo-removebg-preview.png') }}" alt="Logo">
             </div>
           </div>
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
                        <div class="titulo-reconocimiento">
                            <h3>Reconocimiento a:</h3>
                       </div>
                       <div class="text-center compra-area">
                           <h1 class="title-compra">{{ $reconocimiento->nombre }}</h1> 
                       </div>
                       <div class="text-center compra-area">
                           <h5 class="title-compra">{{ $reconocimiento->descripcion }}</h5> 
                       </div>
                       <div class="text-center compra-area">
                           <h4>En el área de:</h4>
                           <h5 class="title-compra">{{ $reconocimiento->area }}</h5> 
                       </div>
                       <div class="text-center compra-area">
                           <h6 class="title-compra">{{ $reconocimiento->fecha }}</h6> 
                       </div>
                   <div class="compras-footer">
                    <form action="{{ route('reconocimientos.destroy', $reconocimiento->id) }}" method="POST">
                           <a href="/reconocimientos/{{ $reconocimiento->id }}/edit" class="btn btn-outline-warning">Editar</a>
                           @csrf
                           @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Borrar</button>
                    </form>
                   </div>

                   <div class="imagen-medalla">
                          <img src="{{ asset('/imagenesJotaRed/medalla-removebg-preview.png') }}" alt="Logo">
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