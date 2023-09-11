@extends('adminlte::page')

@section('title', 'Compras Nacionales')

@section('content_header')
    <h1>Area Compras Nacionales</h1>
@stop

@section('content')
   @can('compras.create')
     <a href="compras/create" class="btn btn-outline-success">CREAR</a>
   @endcan
   <div id="container">
    @foreach ($compras as $compra)
        <div class="product-details">
            <h1>{{ $compra->area }}</h1>
            <p class="information">{{ $compra->lema }}</p>
        </div>

        <div class="product-image">
            @if ($compra->imagen)
                <img src="{{ asset('storage/' . $compra->imagen) }}" alt="Product Image">
            @else
                <div class="text-center">
                    <span class="align-middle">Sin imagen</span>
                </div>
            @endif
        </div>
        @can('compras.destroy')
        <div class="compras-footer">
            <form class="form-boton" action="{{ route('compras.destroy', $compra->id) }}" method="POST">
                <a href="/compras/{{ $compra->id }}/edit" class="btn3 btn btn-outline-warning">✍🏻</a>
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
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
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