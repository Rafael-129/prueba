@extends('layouts.headerIntra') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Contactos')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios @yield('title')</title>
 
</head>
<body>

      <div class="container mt-3">
        @yield('body')
      </div>
</body> 
</html>



@endsection