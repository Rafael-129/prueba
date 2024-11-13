@extends('Anuncios.form')
@section('forName')
    Crear
@endsection
@section('action')
    action="{{route('anuncios.store')}}"
    
@endsection