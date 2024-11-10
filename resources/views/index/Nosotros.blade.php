@extends('layouts.headerIndex') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Nosotros')

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
        <h1 class="text-5xl font-bold text-white">Educacion sin limites</h1>
        <p class="mt-4 text-lg text-white">Educación de calidad en el corazón de Chosica</p>
    </div>
</section>

    <!-- Sección de Misión y Visión -->
    <section class="py-12 px-8 max-w-6xl mx-auto">
        <h2 class="text-center text-3xl font-semibold text-primary mb-8">Nuestra Misión y Visión</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-primary">Misión</h3>
                <p class="mt-4">Proveer una educación integral basada en valores, con el compromiso de formar ciudadanos responsables y preparados para enfrentar los retos del siglo XXI.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-primary">Visión</h3>
                <p class="mt-4">Ser una institución educativa reconocida por su excelencia académica y su contribución al desarrollo de la comunidad en Chosica.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Historia -->
    <section class="py-12 px-8 max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-semibold text-primary mb-6">Nuestra Historia</h2>
        <p class="text-lg">Fundada en el año 1945, la IE Emilio del Solar ha sido una institución clave en la educación de jóvenes en Chosica. Con una metodología basada en los principios de las escuelas nacionales del Perú, hemos evolucionado manteniendo siempre nuestro compromiso con la calidad educativa.</p>
    </section>

    <!-- Sección de Valores -->
    <section class="py-12 px-8 max-w-6xl mx-auto">
        <h2 class="text-3xl font-semibold text-center text-primary mb-8">Nuestros Valores</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-primary">Respeto</h3>
                <p class="mt-4">Fomentamos el respeto mutuo entre estudiantes, profesores y la comunidad educativa.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-primary">Compromiso</h3>
                <p class="mt-4">Nos comprometemos con la formación de estudiantes íntegros y responsables.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-primary">Excelencia</h3>
                <p class="mt-4">Buscamos la excelencia en cada uno de nuestros programas educativos.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="primary-color text-white py-6 text-center">
        <p>&copy; 2024 IE Emilio del Solar - Todos los derechos reservados.</p>
    </footer>

</body>
</html>

@endsection