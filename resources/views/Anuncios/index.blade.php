@extends('layout')

@section('title')
    - Listado
@endsection

@section('body')
<div class="row mb-3">
    <div class="col-12">
        @if(auth()->user()->rol && auth()->user()->rol->idRol == 1) 
            <!-- Solo visible para el profesor -->
            <a href="{{ route('anuncios_profs.create') }}" class="btn btn-success">Crear un nuevo anuncio</a>
        @endif
    </div>
</div>

@if(auth()->user()->rol)
    <p>Rol del usuario: {{ auth()->user()->rol->nombre }}</p>
@else
    <p>El usuario no tiene rol asignado.</p>
@endif


<div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="{{ route('anuncios_profs.index') }}">
            @csrf
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
                        @if(auth()->user()->rol && auth()->user()->rol->idRol == 1)
                            <!-- Botones solo visibles para el profesor -->
                            <th>Editar</th>
                            <th>Eliminar</th>
                        @endif
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
                        @if(auth()->user()->rol && auth()->user()->rol->idRol == 1)
                            <!-- Mostrar botones solo si el usuario es profesor -->
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
                        @endif
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

@section('js')
    @vite('resources/js/Anuncios/index.js')
@endsection
