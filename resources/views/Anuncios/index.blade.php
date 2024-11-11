@extends('layouts.headerIntra') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

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
        <form action="">
            <h3>Contactanos</h3>
            <p>1. Identificación del consumidor reclamante:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consumerType" id="parent" value="parent">
                <label class="form-check-label" for="parent">Padre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consumerType" id="student" value="student">
                <label class="form-check-label" for="student">Alumno</label>
            </div>
            <div class="form-row">
                <input type="text" class="form-control" placeholder="Nombres">
                <input type="text" class="form-control" placeholder="Apellido Paterno">
            </div>
            <div class="form-row">
                <input type="text" class="form-control" placeholder="Apellido Materno">
                <input type="text" class="form-control" placeholder="Fecha de Reclamo">
            </div>

            <p>2. Seleccione el profesor:</p>
            <select class="form-select" aria-label="Seleccione el profesor">
                <option selected>Seleccionar </option>
                <option value="1">Profesor 1</option>
                <option value="2">Profesor 2</option>
                <option value="3">Profesor 3</option>
            </select>

            <p>3. Detalle de la reclamación y pedido del consumidor:</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="claimType" id="consulta" value="consulta">
                <label class="form-check-label" for="consulta">Consulta</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="claimType" id="queja" value="queja">
                <label class="form-check-label" for="queja">Queja</label>
            </div>
            <textarea class="form-control" rows="3" placeholder="Detalles"></textarea>

            <div class="btn-group">
                <button type="button" class="btn btn-primary">ENVIAR</button>
                <button type="button" class="btn btn-secondary">VER ESTADO</button>
            </div>

            <p class="footer-text">
                Destinatario (consumidor, proveedor o INDECOPI según corresponda). 
                La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es 
                requisito previo para interponer una denuncia ante el INDECOPI. El proveedor deberá dar respuesta 
                al reclamo en un plazo no mayor a quince (15) días hábiles.
            </p>
        </form>
    </div>
@endsection