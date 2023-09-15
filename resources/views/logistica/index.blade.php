@extends('adminlte::page')

@section('title', 'Logistica')

@section('content_header')
    <h1>Logistica</h1>
@stop

@section('content')
   @can('logistica.create')
      <a href="{{ route('logistica.create') }}" class="btn btn-outline-success">CREAR</a>
   @endcan
   <div id="container">
       @foreach ($logisticas as $logistica) 
           <div class="product-details">
             <h1>{{ $logistica->area }}</h1>
             <p class="informacion">{{ $logistica->lema }}</p> 
           </div>

            <div class="product-image">
                @if ($logistica->imagen)
                  <img src="{{ asset('storage/' . $logistica->imagen) }}" class="card-img-top" alt="Imagen">
                @else
                  <div class="text-center">
                     <span class="align-middle">Sin imagen</span>
                  </div>
                @endif

            </div>
            @can('logistica.destroy')
            <div class="compras-footer">
                <form action="{{ route('logistica.destroy', $logistica->id) }}" method="POST">
                    <a href="{{ route('logistica.edit', $logistica->id) }}" class="btn3 btn btn-outline-warning">✍🏻</a>
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn2 btn btn-outline-danger">🗑️</button>
                </form>
            </div>
            @endcan
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/logistica.css') }}">
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