@vite(['resources/css/responsive-table.css', 'resources/css/global.css'])


<x-videos-app-layout>
    <div class="container">
        <h1>Gestió de Vídeos</h1>
        <!-- Botó destacat per crear vídeo -->
        <div class="button">
            <a href="{{ route('videos.manage.create') }}">Crear Vídeo</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3">
               <p> {{ session('success') }}</p>
            </div>
        @endif

        <!-- Taula que ocupa tota l'amplada disponible -->
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>URL</th>
                    <th>Data de publicació</th>
                    <th>Anterior</th>
                    <th>Següent</th>
                    <th>Sèrie</th>
                    <th>Usuari</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($videos as $video)
                    <tr>
                        <td data-label="Títol">{{ $video->title }}</td>
                        <td data-label="Descripció">{{ \Str::limit($video->description, 50) }}</td>
                        <td data-label="URL">
                            <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                        </td>
                        <td data-label="Publicació">{{ \Carbon\Carbon::parse($video->published_at)->format('d-m-Y') }}</td>
                        <td data-label="Anterior">{{ $video->previous }}</td>
                        <td data-label="Següent">{{ $video->next }}</td>
                        <td data-label="Sèrie">{{ $video->series->title ?? 'Sense sèrie' }}</td>
                        <td data-label="Usuari">{{ $video->user->name ?? 'Desconegut' }}</td>
                        <td data-label="Accions">
                            <button
                                onclick="window.location.href='{{ route('videos.manage.edit', $video->id) }}'"
                                class="btn btn-warning btn-sm"
                            >
                                Editar
                            </button>

                            <form action="{{ route('videos.manage.destroy', $video->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-videos-app-layout>
