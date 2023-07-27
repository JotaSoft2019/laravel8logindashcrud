@extends('adminlte::page')

@section('title', 'Contabilidad')

@section('content_header')
    <h1>Contabilidad</h1>
@stop

@section('content')
   <a href="{{ route('contabilidads.create') }}" class="btn btn-primary mb-3">CREAR</a>
   
   <div class="row">
       @foreach ($contabilidads as $contabilidad) 
           <div class="col-md-6">
               <div class="card mb-4">
                   @if ($contabilidad->imagen)
                       <img src="{{ asset('/imagenesJotaRed/Equipo contable.jpg') }}" class="card-img-top" alt="Imagen" style="height: 400px; object-fit: cover;">
                   @else
                       <div class="text-center" style="height: 400px; background-color: #eee; display: flex; align-items: center; justify-content: center;">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   <div class="card-body">
                       <h5 class="card-title">{{ $contabilidad->area }}</h5> 
                       <p class="card-text">{{ $contabilidad->lema }}</p> 
                   </div>
                   <div class="card-footer">
                       <form action="{{ route('contabilidads.destroy', $contabilidad->id) }}" method="POST">
                           <a href="{{ route('contabilidads.edit', $contabilidad->id) }}" class="btn btn-info">Editar</a>
                           
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger">Borrar</button>
                       </form>
                   </div>
               </div>
           </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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