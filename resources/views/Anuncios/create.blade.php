@extends('Anuncios.form')

@section('formName', 'Crear')

@section('action')
    action="{{ route('anuncios_profs.store') }}"
@endsection
