@extends('adminlte::page')

@section('title', 'Lideres')

@section('content_header')
    <h1>Lideres Jota Mundial</h1>
@stop

@section('content')
   <a href="lideres/create" class="btn btn-primary mb-3">CREAR</a>

   <div class="row">
       @foreach ($lideres as $lider)
           <div class="col-md-4">
               <div class="card mb-4">
                   @if ($lider->imagen)
                       <img src="{{ asset('/imagenesJotaRed/mrJota.webp') }}" class="card-img-top" alt="Imagen del líder">
                   @else
                       <div class="text-center" style="height: 200px; background-color: #eee;">
                           <span class="align-middle">Sin imagen</span>
                       </div>
                   @endif
                   <div class="card-body">
                       <h5 class="card-title">{{ $lider->nombre }} {{ $lider->apellido }}</h5>
                       <p class="card-text">{{ $lider->area }}</p>
                   </div>
                   <div class="card-footer">
                       <form action="{{ route('lideres.destroy', $lider->id) }}" method="POST">
                           <a href="/lideres/{{ $lider->id }}/edit" class="btn btn-info">Editar</a>
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