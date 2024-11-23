@extends('Anuncios.form')

@section('forName')
    Editar anuncio: <b>{{ $anuncio->detalle }}</b>
@endsection

@section('action')
    action="{{ route('anuncios_profs.update', $anuncio->id) }}"
@endsection

@section('method')
    @method('PUT')
@endsection
