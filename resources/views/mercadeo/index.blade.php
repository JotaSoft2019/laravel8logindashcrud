@extends('adminlte::page')

@section('title', 'Mercadeo y Comunicaciones')

@section('content_header')
    <h1>Mercadeo y Comunicaciones</h1>
@stop

@section('content')
   <a href="{{ route('mercadeo.create') }}" class="btn btn-outline-success">CREAR</a>
   
   <div id="container">
       @foreach ($mercadeos as $mercadeo) 
           <div class="product-details">
             <h5>{{ $mercadeo->area }}</h5>
             <p class="informacion">{{ $mercadeo->lema }}</p> 
           </div>

            <div class="product-image">
                @if ($mercadeo->imagen)
                    <img src="{{ asset('storage/' . $mercadeo->imagen) }}" class="card-img-top" alt="Imagen">
                @else
                    <div class="text-center">
                        <span class="align-middle">Sin imagen</span>
                    </div>
                @endif
            </div>

            <div class="compras-footer">
                <form action="{{ route('mercadeo.destroy', $mercadeo->id) }}" method="POST">
                    <a href="{{ route('mercadeo.edit', $mercadeo->id) }}" class="btn btn-outline-warning">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                </form>
            </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mercadeo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
@stop