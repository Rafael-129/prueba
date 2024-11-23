@extends('layout') 

@section('title')
    - @yield('formName')
@endsection

@section('body')

@if($errors->any())
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <p><b><i class="fa-solid fa-times"></i> Errores </b></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>  
</div>    
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="post" enctype="multipart/form-data">
                    @yield('method')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" name="image" class="form-control" 
                        @isset($anuncio) value="{{$anuncio->image}}" @endisset accept="image/*">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="date" name="fechapub" class="form-control" placeholder="F. Publicación"
                        @isset($anuncio) value="{{$anuncio->fechapub}}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="date" name="fechaev" class="form-control" placeholder="F. Evento"
                        @isset($anuncio) value="{{$anuncio->fechaev}}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-trophy"></i></span>
                        <input type="text" name="lugar" class="form-control" placeholder="Lugar"
                        @isset($anuncio) value="{{$anuncio->lugar}}" @endisset required>
                    </div> 
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-trophy"></i></span>
                        <input type="text" name="detalle" class="form-control" placeholder="Detalle"
                        @isset($anuncio) value="{{$anuncio->detalle}}" @endisset required>
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>    
                    </form>
                </div>
            </div> 

        </div>

    </div>
@endsection