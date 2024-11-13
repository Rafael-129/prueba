@extends('Anuncios.form')

@section('formName')
    Crear
@endsection

@section('action')
    action = "{{route('anuncios.store')}}"
@endsection
