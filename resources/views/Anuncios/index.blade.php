@extends('layout')
@section('title')
    -Listado
@endsection
@section('body')

<div class="row mb-3">
    <div class="col-12">
        <form action="{{ route('anuncios_profs.index') }}" method="GET" class="d-flex mb-3">
            <!-- Campo para filtrar por lugar -->
            <input type="text" name="lugar" class="form-control me-2" placeholder="Buscar por lugar" value="{{ request('lugar') }}">
            
            <!-- Campo para filtrar por fecha del evento -->
            <input type="date" name="fechaev" class="form-control me-2" value="{{ request('fechaev') }}">
            
            <!-- Botón de buscar -->
            <button type="submit" class="btn btn-primary me-2">Buscar</button>
            
            <!-- Botón para restablecer filtros -->
            <a href="{{ route('anuncios_profs.index') }}" class="btn btn-secondary">Restablecer</a>
        </form>
        <a href="{{ route('anuncios_profs.create') }}" class="btn btn-success">Crear un nuevo anuncio</a>
    </div>
</div>

@if($msj = Session::get('success'))
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-success">
                <p><i class="fa-solid fa-check"></i>{{$msj}}</p>
            </div>
        </div>
    </div>
@endif

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
                    @forelse($anuncios_profs as $i => $row)
                    <tr>
                        <td>{{ $i + 1 }}</td>
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
                                <i class="fa-solid fa-edit"></i>
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
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No se encontraron anuncios con los filtros aplicados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
