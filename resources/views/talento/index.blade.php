@extends('adminlte::page')

@section('title', 'Talento Humano')

@section('content_header')
    <h1>Talento Humano</h1>
@stop

@section('content')
   <a href="{{ route('talentoHumano.create') }}" class="btn btn-outline-success">CREAR</a>
   
   <div id="container">
       @foreach ($talentosHumanos as $talentoHumano) 
           <div class="product-details">
             <h1>{{ $talentoHumano->area }}</h1> 
             <p class="information">{{ $talentoHumano->lema }}</p> 
           </div>

           <div class="product-image">
               @if ($talentoHumano->imagen)
                   <img src="{{ asset('storage/' . $talentoHumano->imagen) }}" class="card-img-top" alt="Imagen">
               @else
                   <div class="text-center">
                       <span class="align-middle">Sin imagen</span>
                   </div>
               @endif
           </div>

           <div class="compras-footer">
               <form action="{{ route('talentoHumano.destroy', $talentoHumano->id) }}" method="POST">
                   <a href="{{ route('talentoHumano.edit', $talentoHumano->id) }}" class="btn3 btn btn-outline-warning">✍🏻</a>
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn2 btn btn-outline-primary">🗑️</button>
               </form>
           </div>
       @endforeach
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/talento.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

@stop