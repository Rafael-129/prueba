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
                        @foreach($games as $i => $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->image}}</td>
                            <td>{{$row->fechapub}}</td>
                            <td>{{$row->fechaev}}</td>
                            <td>{{$row->lugar}}</td>
                            <td>{{$row->detalle}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
