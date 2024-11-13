@extends('Anuncios.form')

@section('formName')
    Crear
@endsection

@section('action')
    action = "{{ route('anuncios_profs.store') }}"
@endsection
