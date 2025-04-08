
<x-videos-app-layout>
    <div class="container">
        <h1>{{ $serie->title }}</h1>

        <!-- Descripció de la sèrie -->
        <p>{{ $serie->description }}</p>

        <!-- Missatge d'èxit -->
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Detalls de la sèrie -->
        <div class="mb-4">
            <strong>Publicada el:</strong> {{ $serie->published_at ? : 'No especificada' }}<br>
            @if($serie->user_name)
                <strong>Creada per:</strong> {{ $serie->user_name }}
            @endif
        </div>

        <!-- Taula de vídeos associats a la sèrie -->
        <h3>Vídeos associats</h3>

        @if($videos->isEmpty())
            <p>No hi ha vídeos associats a aquesta sèrie.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Títol</th>
                        <th>Descripció</th>
                        <th>Data de Creació</th>
                        <th>Accions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td>{{ $video->title }}</td>
                            <td>{{ $video->description }}</td>
                            <td>{{ $video->created_at->format('d/m/Y') }}</td>
                            <td>
                                <!-- Accions per als vídeos -->
                                <a href="{{ route('videos.show', $video) }}" class="btn btn-info btn-sm">Veure Detalls</a>
                                <!-- Afegir més accions si cal -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Botó per tornar a la llista de sèries -->
        <div class="mt-3">
            <a href="{{ route('series.index') }}" class="btn btn-secondary">Tornar a les Sèries</a>
        </div>
    </div>
</x-videos-app-layout>
