
        Swal.fire({
            title: "Bienvenido al módulo de Recomendaciones de salud",
            icon: "info",
        });

        document.addEventListener("DOMContentLoaded", function () {
            const nextButton = document.getElementById("nextButton");

            nextButton.addEventListener("click", function () {
                // Hacer una solicitud AJAX para obtener una recomendación aleatoria de tu controlador
                fetch("{{ route('recomendaciones.random') }}")
                    .then((response) => response.json())
                    .then((data) => {
                        // Mostrar la recomendación en una alerta
                        Swal.fire({
                            title: "Nueva Recomendación",
                            text: data.texto,
                            icon: "success",
                        });
                    })
                    .catch((error) => {
                        console.error("Error al obtener una recomendación aleatoria:", error);
                    });
            });
        });