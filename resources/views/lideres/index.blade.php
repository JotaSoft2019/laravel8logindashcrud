@extends('adminlte::page')

@section('title', 'Lideres')

@section('content_header')
    <h1>Lideres Jota Mundial</h1>
@stop

@section('content')
<a href="{{ route('lideres.create') }}" class="btn btn-outline-success">CREAR</a>
    <section class="wrapper">
        <!-- BEGIN: card -->
        <div class="row" id="lideres-container">
            @foreach ($lideres as $lider)
                <div class="col-md-4">
                    <div class="card" data-effect="zoom">
                        <figure class="card__image">
                            @if ($lider->imagen)
                                <img src="{{ asset('storage/' . $lider->imagen) }}" alt="Imagen del líder">
                            @else
                                <div class="text-center" style="background-color: #eee;">
                                    <span class="align-middle">Sin imagen</span>
                                </div>
                            @endif
                        </figure>
                        
                        <div class="card__body">
                            <h3 class="card__name">{{ $lider->nombre }} {{ $lider->apellido }}</h3>
                            <p class="card__job">{{ $lider->area }}</p>
                        </div>

                        <div class="botones">
                        <form action="{{ route('lideres.destroy', $lider->id) }}" method="POST">
                           <a href="{{ route('lideres.edit', $lider->id) }}" class="btn btn-outline-warning">Editar</a>
                           
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-outline-primary">Borrar</button>
                       </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END: card -->
    </section>
@stop









































@section('css')
<link rel="stylesheet" href="{{ asset('css/lideres.css') }}">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/lideres.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
@stop
