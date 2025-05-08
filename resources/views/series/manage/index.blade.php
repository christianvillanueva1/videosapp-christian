@vite(['resources/css/responsive-table.css', 'resources/css/global.css'])


<x-videos-app-layout>
    <div class="container">
        <h1>Gestió de Sèries</h1>


        @if(session('success'))
            <div class="alert alert-success mt-3">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="button">
            <a href="{{ route('series.manage.create') }}">Crear Serie</a>
        </div>


        <!-- Taula de sèries -->
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Data de Publicació</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td data-label="ID">{{ $serie->id }}</td>
                        <td data-label="Títol">{{ $serie->title }}</td>
                        <td data-label="Descripció">{{ \Str::limit($serie->description, 50) }}</td>
                        <td data-label="Data de Publicació">{{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d-m-Y') : 'No publicat' }}</td>
                        <td>
                            <button
                                onclick="window.location.href='{{ route('series.manage.edit', $serie) }}'"
                                class="btn btn-warning btn-sm"
                            >
                                Editar
                            </button>
                            <form action="{{ route('series.manage.destroy', $serie) }}" method="POST" style="display:inline;" data-qa="delete-series-{{ $serie->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur que vols eliminar aquesta sèrie? Els vídeos associats també seran desassignats.')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-videos-app-layout>
