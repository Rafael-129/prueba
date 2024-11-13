@extends('Anuncios.form')

@section('forName')
    Editar anuncio: <b>{{ $anuncios_profs->detalle }}</b>
@endsection

@section('action')
    action="{{ route('anuncios_profs.update', $anuncios_profs) }}"
@endsection

@section('method')
    @method('PUT')
@endsection
