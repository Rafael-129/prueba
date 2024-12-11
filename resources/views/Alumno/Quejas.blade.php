@extends('layouts.headerIntra')     
@section('title', 'Quejas')

@section('content')
<style>
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: white;
            max-width: 800px; /* Aumentado el ancho máximo */
            width: 90%; /* Para que ocupe el 90% del ancho de la pantalla */
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            font-weight: bold;
            margin: 10px 0;
        }
        .form-check {
            display: inline-block;
            margin-right: 15px;
        }
        .form-check-label {
            font-weight: 600;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            flex: 1; /* Asegura que cada entrada ocupe el mismo espacio */
            min-width: 150px;
        }
        .form-select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap; /* Permite que los elementos se envuelvan si es necesario */
            gap: 15px; /* Espacio entre los elementos */
        }
        textarea.form-control {
            resize: vertical;
        }
        .btn {
            width: 48%;
            padding: 12px;
            border-radius: 5px;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            margin-right: 4%;
        }
        .btn-secondary {
            background-color: #dc3545;
        }
        .footer-text {
            font-size: 12px;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between; /* Espacio uniforme entre los botones */
            gap: 10px; /* Espacio entre los botones */
        }
        /* Reglas responsivas */
        @media (max-width: 768px) {
            .container {
                max-width: 100%; /* Ancho completo en pantallas más pequeñas */
                padding: 20px;
            }
            .btn {
                width: 100%; /* Botones en ancho completo */
                margin-right: 0;
                margin-bottom: 10px; /* Espacio entre botones */
            }
        }
    </style>
</head>
<body>
<div class="container">
<form action="{{ route('guardarConsulta') }}" method="POST">
        @csrf

        <h3>Contactanos</h3>

        <!-- Información del consumidor -->
        <p>1. Identificación del consumidor:</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoConsumidor" id="Padre" value="Padre">
            <label class="form-check-label" for="Padre">Padre</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoConsumidor" id="Alumno" value="Alumno">
            <label class="form-check-label" for="Alumno">Alumno</label>
        </div>

        <!-- Datos del consumidor -->
        <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
        <input type="text" class="form-control" name="apellidoPaterno" placeholder="Apellido Paterno" required>
        <input type="text" class="form-control" name="apellidoMaterno" placeholder="Apellido Materno" required>

        <p>Que día sucesdio(Si es una queja)</p>
        <input type="date" class="form-control" name="fechaReclamo">

        <!-- Campo oculto para el idAlumno -->
        <input type="hidden" name="idAlumno" value="{{ $idAlumno }}">

        <!-- Selección de profesor -->
        <p>2. Seleccione al profesor:</p>
        <select class="form-select" name="idProfesor" required>
            <option selected disabled>Seleccione un profesor</option>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombre }}</option>
            @endforeach
        </select>

        <!-- Descripción de la queja o consulta -->
        <p>3. Detalle de la reclamación o consulta:</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoConsulta" id="consulta" value="Consulta">
            <label class="form-check-label" for="consulta">Consulta</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipoConsulta" id="queja" value="Queja">
            <label class="form-check-label" for="queja">Queja</label>
        </div>
        <textarea class="form-control" name="descripcion" rows="3" placeholder="Escriba los detalles" required></textarea>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Enviar Consulta</button>
            <a href="{{ route('Alumno.Conectados') }}" class="btn btn-primary">Ver estado</a>
        </div>
    </form>
</div>
@endsection