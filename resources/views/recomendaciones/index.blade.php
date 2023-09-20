@extends('adminlte::page')

@section('title', 'Recomendaciones de salud')

@section('content_header')
    <h1>Recomendaciones de salud</h1>
@stop

@section('content')
<body>
    <div class="container">
        <div class="recommendation-container">
            <div id="recommendation" class="recommendation">
                Cargando recomendación...
            </div>
        </div>
        <button id="nextButton" class="btn">Mostrar otra recomendación</button>
    </div>
</body>
    
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/recomendacion.css') }}">
@stop
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const recommendations = [
        "Bebe suficiente agua durante el día.",
        "Realiza ejercicio regularmente.",
        "Come una dieta equilibrada.",
        "Duerme al menos 7-8 horas por noche.",
        "La postura correcta es importante.",
        "Identificar bien tu puesto de trabajo.",
        "Realiza descansos regulares.",
        "Usa el equipo de seguridad.",
        "Utiliza herramientas y máquinas de forma adecuada.",
        "Informa las condiciones inseguras al supervisor.",
        "Reduce el estrés."
    ];

    const recommendationContainer = document.getElementById("recommendation");
    const nextButton = document.getElementById("nextButton");

    function displayRandomRecommendation() {
        const randomIndex = Math.floor(Math.random() * recommendations.length);
        const randomRecommendation = recommendations[randomIndex];
        recommendationContainer.textContent = randomRecommendation;
    }

    displayRandomRecommendation(); // Muestra una recomendación aleatoria al cargar la página

    nextButton.addEventListener("click", displayRandomRecommendation); // Cambia la recomendación al hacer clic en el botón
});
    </script>
    
@stop
