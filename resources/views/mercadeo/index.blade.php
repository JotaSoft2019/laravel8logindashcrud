@extends('adminlte::page')

@section('title', 'Mercadeo Y comunicaciones')

@section('content_header')
    <h1>Mercadeo Y comunicaciones</h1>
@stop

@section('content')
   <a href="{{ route('mercadeo.create') }}" class="btn btn-primary mb-3">CREAR</a>
   
   <div class="row">
       @foreach ($mercadeos as $mercadeo) 
           <div class="col-md-6">
               <div class="card mb-4">
                   @if ($mercadeo->imagen)
                       <img src="{{ asset('/imagenesJotaRed/mercadeo.png') }}" class="card-img-top" alt="Imagen" style="height: 400px; object-fit: cover;">
                   @else
                       <div class="text-center" style="height: 400px; background-color: #eee; display: flex; align-items: center; justify-content: center;">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   <div class="card-body">
                       <h5 class="card-title">{{ $mercadeo->area }}</h5> 
                       <p class="card-text">{{ $mercadeo->lema }}</p> 
                   </div>
                   <div class="card-footer">
                       <form action="{{ route('mercadeo.destroy', $mercadeo->id) }}" method="POST">
                           <a href="{{ route('mercadeo.edit', $mercadeo->id) }}" class="btn btn-info">Editar</a>
                           
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