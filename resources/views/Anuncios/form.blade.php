@extends('layout') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title')
    - @yield('formName')
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="post">
                    @yield('method')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" name="image" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="text" name="fechapub" class="form-control" placeholder="F. Publicación" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="text" name="fechaev" class="form-control" placeholder="F. Evento" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-trophy"></i></span>
                        <input type="text" name="lugar" class="form-control" placeholder="Lugar" required>
                    </div> 
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-trophy"></i></span>
                        <input type="text" name="detalle" class="form-control" placeholder="Detalle" required>
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>    
                    </form>
                </div>
            </div> 

        </div>

    </div>
@endsection