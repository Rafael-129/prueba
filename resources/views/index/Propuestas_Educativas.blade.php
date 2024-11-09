@extends('layouts.headerIndex') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Propuesta Educativa')

@section('content')
<!-- Aqui editas -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Emilio del Solar - Propuesta Educativa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Encabezado de la sección -->
<section class="py-6" style="background-color: #1F308A;">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold text-white">Emilio del Solar</h1>
        <p class="mt-2 text-xl text-white">Chosica</p>
        <p class="mt-4 text-lg text-white">Un enfoque educativo integral que abarca los niveles de 1 a 6 de primaria.</p>
    </div>
</section>

<!-- Niveles de Educación -->
<div class="container mx-auto py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- Nivel 1 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-1.jpg" alt="Nivel 1" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 1</h3>
            <p class="mt-2 text-gray-600">Introducción a la lectura, escritura y desarrollo de habilidades sociales en un entorno de aprendizaje seguro.</p>
        </div>
    </div>

    <!-- Nivel 2 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-2.jpg" alt="Nivel 2" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 2</h3>
            <p class="mt-2 text-gray-600">Fortalecimiento de la lectura y escritura, y primeros pasos en matemáticas básicas a través de actividades lúdicas.</p>
        </div>
    </div>

    <!-- Nivel 3 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-3.jpg" alt="Nivel 3" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 3</h3>
            <p class="mt-2 text-gray-600">Desarrollo de habilidades de pensamiento crítico y resolución de problemas en matemáticas y ciencias.</p>
        </div>
    </div>

    <!-- Nivel 4 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-4.jpg" alt="Nivel 4" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 4</h3>
            <p class="mt-2 text-gray-600">Enfoque en la comprensión lectora y expresión escrita, junto con conceptos de ciencias naturales y sociales.</p>
        </div>
    </div>

    <!-- Nivel 5 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-5.jpg" alt="Nivel 5" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 5</h3>
            <p class="mt-2 text-gray-600">Profundización en habilidades matemáticas y pensamiento lógico, así como en ciencias y tecnología.</p>
        </div>
    </div>

    <!-- Nivel 6 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="link-a-la-imagen-del-nivel-6.jpg" alt="Nivel 6" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-semibold text-blue-800">Nivel 6</h3>
            <p class="mt-2 text-gray-600">Preparación integral para la transición a secundaria, enfocada en autonomía, responsabilidad y habilidades sociales.</p>
        </div>
    </div>

</div>

</body>
</html>

@endsection
