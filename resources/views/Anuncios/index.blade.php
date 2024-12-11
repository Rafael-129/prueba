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
                <a href="{{ route('anuncios_profs.create') }}" class="btn btn-primary btn-lg shadow">
                    <i class="fa-solid fa-plus-circle"></i> Crear un nuevo anuncio
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('anuncios_profs.index') }}" class="p-4 border rounded shadow">
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
                        <button type="submit" class="btn btn-success shadow">
                            <i class="fa-solid fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('anuncios_profs.index') }}" class="btn btn-secondary shadow">
                            <i class="fa-solid fa-undo"></i> Restablecer
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @forelse($anuncios_profs as $row)
                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">
                        @if($row->image)
                            <img class="card-img-top" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8f9fa;">
                                <span class="text-muted">Sin imagen</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->lugar }}</h5>
                            <p class="card-text">{{ $row->detalle }}</p>
                            <p class="text-muted mb-1"><strong>Fecha Evento:</strong> {{ $row->fechaev }}</p>
                            <p class="text-muted"><strong>Fecha Publicación:</strong> {{ $row->fechapub }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('anuncios_profs.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pencil-alt"></i> Editar
                            </a>
                            <form id="frm_{{ $row->id }}" method="POST" action="{{ route('anuncios_profs.destroy', $row->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No hay anuncios disponibles</p>
                </div>
            @endforelse
        </div>
    @elseif(auth()->check() && auth()->user()->rol && auth()->user()->rol->idRol == 2)
        <!-- Vista para Alumnos (idRol == 2) -->
        <div class="row">
            @forelse($anuncios_profs as $row)
                <div class="col-md-6 mb-4">
                    <div class="card shadow h-100">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#anuncioModal{{ $row->id }}">
                            @if($row->image)
                                <img class="card-img-top" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio" style="height: 300px; object-fit: cover;">
                            @endif
                        </a>
                        <div class="card-body">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#anuncioModal{{ $row->id }}">
                                <h5 class="card-title text-primary">{{ $row->lugar }}</h5>
                            </a>
                            <p class="card-text">{{ Str::limit($row->detalle, 100) }}</p>
                            <p class="text-muted"><strong>Fecha:</strong> {{ $row->fechaev }}</p>
                        </div>
                    </div>
                </div>

                <!-- Modal para mostrar anuncio expandido -->
                <div class="modal fade" id="anuncioModal{{ $row->id }}" tabindex="-1" aria-labelledby="anuncioModalLabel{{ $row->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="anuncioModalLabel{{ $row->id }}">{{ $row->lugar }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if($row->image)
                                    <img class="img-fluid mb-3" src="{{ asset('storage/' . $row->image) }}" alt="Imagen del anuncio">
                                @endif
                                <p><strong>Fecha del evento:</strong> {{ $row->fechaev }}</p>
                                <p><strong>Fecha de publicación:</strong> {{ $row->fechapub }}</p>
                                <p>{{ $row->detalle }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No hay anuncios disponibles</p>
                </div>
            @endforelse
        </div>
    @endif
</div>
@endsection

@section('js')
    @vite('resources/js/Anuncios/index.js')
@endsection
