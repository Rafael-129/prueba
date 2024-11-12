@extends('layout')
@section('title')
    -Listado
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IMAGEN</th>
                            <th>F. PUBLICACIÓN</th>
                            <th>F. EVENTO</th>
                            <th>LUGAR</th>
                            <th>DETALLE</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anuncios_profs as $i => $row)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>
                                <img class="img-fluid" src="/storage/{{ $row->imagen}}">
                            </td>
                            <td>{{$row->fechapub}}</td>
                            <td>{{$row->fechaev}}</td>
                            <td>{{$row->lugar}}</td>
                            <td>{{$row->detalle}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('Anuncios.edit', $row->id)}}">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach <!-- Cierre del bucle -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection