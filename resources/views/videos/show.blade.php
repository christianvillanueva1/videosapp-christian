@vite(['resources/css/video-show.css', 'resources/css/global.css'])

<x-videos-app-layout>
    <div class="video-container">

        <div class="video-frame">
            <iframe
                src="{{ $video['url'] }}"

                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        <a href="{{ $video['url'] }}" target="_blank" class="video-link">Mira el vídeo en una nova finestra</a>
        <h1 class="video-title">{{ $video['title'] }}</h1>
        <p class="video-description">{{ $video['description'] }}</p>
        <ul class="video-info">
            <li>{{ \Carbon\Carbon::parse($video['published_at'])->format('d-m-Y') }}</li>
            <li>Anterior vídeo: {{ $video['previous'] }}</li>
            <li>Següent vídeo: {{ $video['next'] }}</li>
            <li>Sèrie: {{ $video->series->title ?? 'Sense sèrie' }}</li>
            <li>Usuari: {{ $video->user->name ?? 'Desconegut' }}</li>
        </ul>
        @if (auth()->user() && auth()->user()->id == $video['user_id'])
            <div class="video-actions">
                <button
                    onclick="window.location.href='{{ route('videos.edit', $video['id']) }}'"
                    class="button"
                >
                    Editar
                </button>
                <form action="{{ route('videos.destroy', $video['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button">Eliminar</button>
                </form>
            </div>
        @endif
    </div>
</x-videos-app-layout>

