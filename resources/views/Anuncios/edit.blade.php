@extends('Anuncios.form')

@section('formName', 'Editar anuncio: ' . $anuncio->detalle)

@section('action')
    action="{{ route('anuncios_profs.update', $anuncio->id) }}"
@endsection

@section('method')
    @method('PUT')
@endsection
