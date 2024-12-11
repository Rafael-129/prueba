@extends(auth()->check() && auth()->user()->rol && auth()->user()->rol->idRol == 1 ? 'layouts.headerProf' : 'layouts.headerIntra')

@section('title')
    - Listado
@endsection

@section('content')
<div class="container mt-5">
    @if(auth()->check() && auth()->user()->rol && auth()->user()->rol->idRol == 1)
        <!-- Vista para Profesores (idRol == 1) -->
        <div class="row mb-4 justify-content-center">
            <div class="col-12 text-center">
                <a href="{{ route('anuncios_profs.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus-circle"></i> Crear un nuevo anuncio
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('anuncios_profs.index') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="lugar" class="form-label">Buscar anuncio por lugar:</label>
                        <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar" value="{{ request('lugar') }}">
                    </div>
                    <div class="mb-3">
                        <label for="fechaev" class="form-label">Buscar anuncio por fecha del evento:</label>
                        <input type="date" name="fechaev" id="fechaev" class="form-control" value="{{ request('fechaev') }}">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('anuncios_profs.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-undo"></i> Restablecer
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>F. Publicación</th>
                        <th>F. Evento</th>
                        <th>Lugar</th>
                        <th>Detalle</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anuncios_profs as $i => $row)
                        <tr>
                            <td>{{ $loop->iteration + ($anuncios_profs->currentPage() - 1) * $anuncios_profs->perPage() }}</td>
                            <td>
                                @if($row->image)
                                    <img class="img-fluid" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio" style="max-width: 120px; height: auto;">
                                @else
                                    <span class="text-muted">Sin imagen</span>
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
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay anuncios disponibles</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="pagination-wrapper">
                    {{ $anuncios_profs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @elseif(auth()->check() && auth()->user()->rol && auth()->user()->rol->idRol == 2)
        <!-- Vista para Alumnos (idRol == 2) -->
        <div class="row">
            @forelse($anuncios_profs as $row)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if($row->image)
                            <img class="card-img-top" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->fechaev }}</h5>
                            <p class="card-text"><strong>Lugar:</strong> {{ $row->lugar }}</p>
                            <p class="card-text">{{ $row->detalle }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No hay anuncios disponibles</p>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="pagination-wrapper">
                    {{ $anuncios_profs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('js')
    @vite('resources/js/Anuncios/index.js')
@endsection
