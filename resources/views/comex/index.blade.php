@extends('adminlte::page')

@section('title', 'Comex')

@section('content_header')
    <h1>Comex</h1>
@stop

@section('content')
   
   @can('comex.create')
     <a href="comex/create" class="btn btn-outline-success">CREAR</a>
   @endcan
   <div id="container">
       @foreach ($comexs as $comex) 
           <div class="product-details">
             <h1>{{ $comex->area }}</h1>
             <p class="informacion">{{ $comex->lema }}</p> 
           </div>

            <div class="product-image">
                @if ($comex->imagen)
                   <img src="{{ asset('storage/' . $comex->imagen) }}" class="card-img-top" alt="Imagen">  
                   @else
                       <div class="text-center">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif

            </div>

            <div class="compras-footer">
                <form action="{{ route('comex.destroy', $comex->id) }}" method="POST">
                    <a href="/comex/{{ $comex->id }}/edit" class="btn3 btn btn-outline-warning">✍🏻</a> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn2 btn btn-outline-danger">🗑️</button>
            </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/comex.css') }}">
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