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
            </tr>
        </thead>
        <tbody>
            @forelse($anuncios_profs as $row)
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
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No se encontraron anuncios disponibles.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $anuncios_profs->links('pagination::bootstrap-5') }}
</div>
