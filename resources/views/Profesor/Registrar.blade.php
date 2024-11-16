@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Anuncios')

@section('content')
<style>
    /* CSS de Registro de Usuario */
    .contenedor-login {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    .caja-login {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 30px;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .logo-login img {
        max-width: 240px;
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
    input[type="password"],
    input[type="email"] {
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
        background-color: #c00;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .boton-login:hover {
        background-color: #900;
    }

    .mensaje-info {
        display: block;
        margin-top: 10px;
        font-size: 12px;
        color: #007bff;
        text-decoration: none;
    }

    .mensaje-info:hover {
        text-decoration: underline;
    }

</style>    

<br>
<!-- Registro de Usuario -->
<div class="contenedor-login">
    <div class="caja-login">
        <div class="logo-login">
            <img src="{{ asset('images/logo_eduplus.jpeg') }}" alt="EduPlus Logo">
        </div>

        <form action="{{ route('registrar')}}" method="post" >
            @csrf
            @method('POST')

            <div>
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @if ($errors->has('nombre'))
                    <div class="error-message">{{ $errors->first('nombre') }}</div>
                @endif
            </div>

            <div>
                <label for="apellido" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                @if ($errors->has('apellido'))
                    <div class="error-message">{{ $errors->first('apellido') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI" value="{{ old('DNI') }}" required>
                @if ($errors->has('DNI'))
                    <div class="error-message">{{ $errors->first('DNI') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" id="rol" class="form-select" required>
                    <option selected>Seleccione</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->idRol }}" {{ old('rol') == $rol->idRol ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('rol'))
                    <div class="error-message">{{ $errors->first('rol') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit" class="boton-login">Registrar</button>
        </form>
    </div>
</div>
<br>
@endsection