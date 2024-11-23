@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Contactos')

@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Otros estilos adicionales -->
</head>

<body>
    <!-- Contenedor principal -->
    <div class="container mt-3">
        @yield('body')
    </div>

    <!-- Bootstrap JS (Opcional, para componentes interactivos como modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>

@endsection
