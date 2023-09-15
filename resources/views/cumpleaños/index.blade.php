@extends('adminlte::page')

@section('title', 'Cumpleaños')

@section('content_header')

@stop

@section('content')
@if ($users->count() > 0)
<div class="card" style="width:400px">
  <div class="card-body">
  <img src="{{ asset('/imagenesJotaRed/logoJotaMundial.png') }}" alt="Logo">
    <ul class="lista-cumpleanio">
        @foreach ($users as $user)
            <li><b>{{ $user->name }} {{ $user->apellido }}</b></li>
            <li><h6>{{ $user->date ? \Carbon\Carbon::parse($user->date)->format('d - m ') : 'Fecha de nacimiento no disponible' }}</h6></li>
        @endforeach
    </ul>
<div class="parrafo">
    <p class="card-text">Hoy es un día súper especial, cumples <b>un año más de vida</b> y lo puedes celebrar junto a la familia Jota Mundial, por eso hoy te decimos</p>
    <h5 class="card-title">Feliz Cumpleaños</h5>
</div>
<br>
<div class="boton">
   <a href="{{ route('mensaje.create') }}" class="birthday-button">Felicitar 🎂</a>
</div>
    
  </div>
</div>
@endif
<div class="mensaje">
<h3>Mensajes de Cumpleaños:</h3>
@if ($users->count() > 0 && $mensajes->count() > 0)
    <ul>
        @foreach ($mensajes as $mensaje)
            <li>{{ $mensaje->contenido }}</li>
        @endforeach
    </ul>
    
@else
    <p>No hay mensajes de cumpleaños.</p>
@endif

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.birthday-button').click(function () {
            $('.birthday-button').addClass('active');
            setTimeout(function () {
                $('.birthday-button').removeClass('active');
            }, 1000); // Eliminar la clase 'active' después de 1 segundo
        });
    });
</script>
@stop