@extends('adminlte::page')

@section('title', 'Recomendaciones de salud')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')
<body>
    <div class="container">

    <a href="{{ route('recomendaciones.index') }}" id="nextButton" class="btn">Mostrar otra recomendación</a>
        <div class="recommendation-container">
            <div id="recommendation" class="recommendation">
                {!! $recomendacionAleatoria->texto !!}
            </div>
        </div>
    </div>
</body> 
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/recomendacion.css') }}">
@stop
@section('js')
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
       /* document.addEventListener("DOMContentLoaded", function () {
            const nextButton = document.getElementById("nextButton");

            nextButton.addEventListener("click", function () {
                // Hacer una solicitud AJAX para obtener una recomendación aleatoria de tu controlador
                fetch("{{ route('recomendaciones.random') }}")
                    .then((response) => response.json())
                    .then((data) => {
                        // Actualiza el contenido con la recomendación aleatoria
                        const recommendationContainer = document.getElementById("recommendation");
                        recommendationContainer.textContent = data.texto;
                    })
                    .catch((error) => {
                        console.error("Error al obtener una recomendación aleatoria:", error);
                    });
            });
        });*/
    </script>
    
@stop
