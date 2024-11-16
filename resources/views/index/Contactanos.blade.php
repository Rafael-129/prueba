@extends('layouts.headerIndex') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Contactos')

@section('content')
<!-- Aqui editas -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Barra superior -->
    <div class="bg-blue-700 text-white text-center py-2">
        <p>Llena tus datos y te responderemos a la brevedad posible</p>
    </div>

    <!-- Contenedor principal -->
    <div class="flex justify-center items-center py-8">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            
            <h2 class="text-gray-700 font-semibold mb-4">Datos del padre de familia:</h2>

            <!-- Formulario -->
            <form action="https://formsubmit.co/5778b39c84f250b33920d954b15c1cd1" method="POST">
                
                <!-- Nombre y Apellidos -->
                <div class="flex space-x-4 mb-4">
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="w-1/2 px-3 py-2 border border-gray-300 rounded">
                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" class="w-1/2 px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- DNI, Email y Celular -->
                <div class="flex space-x-4 mb-4">
                    <input type="text" id="dni" name="dni" placeholder="DNI" class="w-1/3 px-3 py-2 border border-gray-300 rounded">
                    <input type="email" id="email" name="email" placeholder="Email" class="w-1/3 px-3 py-2 border border-gray-300 rounded">
                    <input type="tel" id="celular" name="celular" placeholder="Celular" class="w-1/3 px-3 py-2 border border-gray-300 rounded">
                </div>
                
                <!-- Hora de contacto -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="hora_contacto">¿A qué hora te contactamos?</label>
                    <select id="hora_contacto" name="hora_contacto" class="w-full px-3 py-2 border border-gray-300 rounded">
                        <option>8 a.m. a 11 a.m.</option>
                        <option>11 a.m. a 2 p.m.</option>
                        <option>2 p.m. a 5 p.m.</option>
                    </select>
                </div>

                <!-- Grado de interés -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1" for="grado_interes">Grado de interés</label>
                    <select id="grado_interes" name="grado_interes" class="w-full px-3 py-2 border border-gray-300 rounded">
                        <option>1ero primaria</option>
                        <option>2do primaria</option>
                        <option>3ero primaria</option>
                        <option>4to primaria</option>
                        <option>5to primaria</option>
                        <option>6to primaria</option>
                    </select>
                </div>

                <!-- Checkbox de políticas -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="politicas" name="politicas" class="mr-2">
                    <label class="text-gray-700" for="politicas">Acepto las políticas de uso de datos.</label>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-full hover:bg-blue-800 transition">Solicitar información</button>
            </form>

        </div>
    </div>

    <!-- Sección de información adicional -->
    <div class="text-center py-8">
        <h2 class="text-blue-700 font-semibold text-xl mb-4">Calidad educativa garantizada:</h2>
        <p class="text-gray-700">
            • Plana Docente expertos en estrategias de enseñanza. <br>
            • Comunicación Académica. El tutor es un soporte para el estudiante. <br>
            • Talleres psicoeducativos para mejorar el aspecto socioemocional de los estudiantes.
        </p>
    </div>

</body>
</html>
@endsection