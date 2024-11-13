@extends('Anuncios.form')

@section('formName')
    Crear
@endsection

@section('action')
    action = "{{route('Anuncios.store')}}"
@endsection
