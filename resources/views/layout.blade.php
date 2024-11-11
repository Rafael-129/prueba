<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios @yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    @extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

    @section('title', 'Anuncios')

    <div class="container mt-3">
        @yield('body')
    </div>

    @section('content')

    @endsection
</body>
</html>