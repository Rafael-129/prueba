@extends('layout')
@section('title')
    -Listado
@endsection
@section('body')

<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('anuncios_profs.create') }}" class="btn btn-success">Crear un nuevo anuncio</a>
    </div>
</div>

@if($msj = Session::get('success'))
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success">
                <p><i class="fa-solid fa-check"></i> {{ $msj }}</p>
            </div>
        </div>
    </div>
@endif

<div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="{{ route('anuncios_profs.index') }}">
            <label for="lugar" class="form-label">Buscar anuncio por lugar:</label>
            <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar" value="{{ request('lugar') }}">
    </div>
    <div class="col-md-6">
            <label for="fechaev" class="form-label">Buscar anuncio por fecha del evento:</label>
            <input type="date" name="fechaev" id="fechaev" class="form-control" value="{{ request('fechaev') }}">
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12 text-end">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('anuncios_profs.index') }}" class="btn btn-secondary">Restablecer</a>
        </form>
    </div>
</div>

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
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anuncios_profs as $i => $row)
                    <tr>
                        <td>{{ $loop->iteration + ($anuncios_profs->currentPage() - 1) * $anuncios_profs->perPage() }}</td>
                        <td>
                            @if($row->image)
                                <img class="img-fluid" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio" style="max-width: 120px; height: auto;">
                            @else
                                <span>Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $row->fechapub }}</td>
                        <td>{{ $row->fechaev }}</td>
                        <td>{{ $row->lugar }}</td>
                        <td>{{ $row->detalle }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('anuncios_profs.edit', $row->id) }}">
                                <i class="fa-solid fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td>
                            <form id="frm_{{ $row->id }}" method="POST" action="{{ route('anuncios_profs.destroy', $row->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <div class="pagination-wrapper">
            {{ $anuncios_profs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
