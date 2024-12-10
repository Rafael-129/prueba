@extends('layouts.headerIndex') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Login')

@section('content')
<br>
<br>
<style>
    /* CSS de Inicio de Sesion */
    .contenedor-login {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin: 0; /* Asegúrate de que no haya margen en el contenedor */
    }

    .caja-login {
        background-color: white;
        border-radius: 10px;
        padding: 40px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin: 0; /* Asegúrate de que no haya margen en la caja */
        
    }

    .logo-login img {
        max-width: 250px;
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
        text-align: left;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: left;
    }

    .boton-login {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .boton-login:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<div class="contenedor-login">
    <div class="caja-login">
        <div class="logo-login">
            <img src="{{ asset('images/logo_eduplus.jpeg') }}" alt="EduPlus Logo">
        </div>

        <!-- Mostrar alertas -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('IniSesion') }}">
            @csrf
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="boton-login">Iniciar sesión</button>
        </form>
    </div>
</div>
<br>
<br>

@endsection

