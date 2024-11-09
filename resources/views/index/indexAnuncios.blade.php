@extends('layouts.headerIndex') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Anuncios')

@section('content')
<!-- Aqui editas -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Información Educativa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .section-title {
            background-color: #1E3A8A;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-weight: bold;
        }

        .hexagon-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .hexagon {
            width: 100px;
            height: 100px;
            background-color: #E2E8F0;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #333;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Sección de Notas Educativas -->
    <section class="section">
    <div class="flex justify-center mt-4 mb-6 gap-4 max-w-screen-lg mx-auto">
        <img src="{{ asset('IIEE.jpg') }}" alt="Imagen 1" class="w-1/3 px-1 object-cover">
        <img src="{{ asset('IIEE2.jpg') }}" alt="Imagen 2" class="w-1/3 px-1 object-cover">
        <img src="{{ asset('IIEE3.jpg') }}" alt="Imagen 3" class="w-1/3 px-1 object-cover">
    </div>
    <div class="section-title text-center">Notas Educativas:</div>
    <div class="px-6 space-y-4 mt-4 max-w-screen-lg mx-auto">
        <div>
            <h3 class="text-lg font-semibold">¿Cómo fomentar el respeto en la escuela y el hogar?</h3>
            <p class="text-justify">La Cultura Educativa en el colegio Emilio del Solar de Chosica, permite a través de los valores, cultivar el respeto en todos los espacios en la escuela. Consideramos fundamental promover el respeto para lograr una convivencia saludable para todos y todas. Esta Cultura Educativa del respeto es una oportunidad para todas las familias, ya que se brindan herramientas a los estudiantes para crear un ambiente de aprendizaje positivo y armonioso, no solo en el aula sino en todo lugar donde se encuentre.</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold">7 Actividades divertidas para un aprendizaje efectivo en niños</h3>
            <ul class="list-disc ml-6">
                <li>Experimentos científicos en casa</li>
                <li>Juegos de mesa educativos</li>
                <li>Lectura en voz alta</li>
                <li>Manualidades creativas</li>
                <li>Juegos al aire libre</li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Tips para aprender mejor las matemáticas</h3>
            <p class="text-justify">No debemos tener miedo de realizar preguntas de matemáticas, es importante preguntar y hacer conocer todas las dudas que tenemos sobre la asignatura, ya que esto te asegura “seguir el hilo” de la teoría y mantener el aprendizaje continuo.</p>
        </div>
    </div>
</section>


    <!-- Sección de Valores Institucionales -->
    <section class="section mt-8">
        <div class="section-title">Valores Institucionales:</div>
        <div class="hexagon-container my-6">
            <div class="hexagon">Respeto</div>
            <div class="hexagon">Compromiso</div>
            <div class="hexagon">Responsabilidad</div>
            <div class="hexagon">Confianza</div>
            <div class="hexagon">Solidaridad</div>
            <div class="hexagon">Tolerancia</div>
            <div class="hexagon">Innovación</div>
        </div>
    </section>

    <!-- Sección de Metodología por Niveles Educativos -->
    <section class="section mt-8">
        <div class="section-title">Conoce nuestra Metodología por Niveles Educativos</div>
        <div class="flex justify-center mt-6 mb-6 gap-8">
            <div class="text-center">
                <img src="{{ asset('IIEE4.jpg') }}" alt="Nivel Inicial" class="w-40 h-40 object-cover mx-auto mb-2">
                <p class="font-semibold">Nivel Inicial</p>
            </div>
            <div class="text-center">
                <img src="{{ asset('IIEE5.jpg') }}" alt="Nivel Primaria" class="w-40 h-40 object-cover mx-auto mb-2">
                <p class="font-semibold">Nivel Primaria</p>
            </div>
        </div>
    </section>

    <!-- Sección de Separar Vacantes -->
    <section class="section mt-8">
        <div class="section-title">Separa tus vacantes 2024</div>
        <div class="flex justify-center mt-6 mb-6">
            <img src="{{ asset('IIEE6.jpg') }}" alt="Últimas Vacantes" class="w-full max-w-lg object-cover">
        </div>
    </section>

</body>

</html>
@endsection
