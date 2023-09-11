@extends('adminlte::page')

@section('title', 'Cumpleaños')

@section('content_header')
    
@stop

@section('content')
<a href="cumpleaños/create" class="btn btn-outline-success">CREAR</a>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cumpleanios.css') }}">
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
