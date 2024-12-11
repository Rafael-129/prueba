@extends('layouts.headerProf') 

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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>@yield('formName')</span>
                <a href="{{ route('anuncios_profs.index') }}" class="btn btn-light btn-sm">
                    <i class="fa-solid fa-arrow-left"></i> Regresar
                </a>
            </div>
            <div class="card-body">
                <form @yield('action') method="post" enctype="multipart/form-data" class="p-3">
                    @yield('method')
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label"><i class="fa-solid fa-image"></i> Imagen</label>
                        <input type="file" name="image" id="image" class="form-control" 
                        @isset($anuncio) value="{{$anuncio->image}}" @endisset accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="fechapub" class="form-label"><i class="fa-solid fa-calendar"></i> Fecha de Publicación</label>
                        <input type="date" name="fechapub" id="fechapub" class="form-control" 
                        @isset($anuncio) value="{{$anuncio->fechapub}}" @endisset required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaev" class="form-label"><i class="fa-solid fa-calendar"></i> Fecha del Evento</label>
                        <input type="date" name="fechaev" id="fechaev" class="form-control" 
                        @isset($anuncio) value="{{$anuncio->fechaev}}" @endisset required>
                    </div>
                    <div class="mb-3">
                        <label for="lugar" class="form-label"><i class="fa-solid fa-map-marker-alt"></i> Lugar</label>
                        <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar del evento"
                        @isset($anuncio) value="{{$anuncio->lugar}}" @endisset required>
                    </div> 
                    <div class="mb-3">
                        <label for="detalle" class="form-label"><i class="fa-solid fa-info-circle"></i> Detalle</label>
                        <textarea name="detalle" id="detalle" class="form-control" rows="4" placeholder="Detalle del anuncio" required>@isset($anuncio){{ $anuncio->detalle }}@endisset</textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success btn-lg" type="submit">
                            <i class="fa-solid fa-save"></i> Guardar
                        </button>
                        <a href="{{ route('anuncios_profs.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fa-solid fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
@endsection
