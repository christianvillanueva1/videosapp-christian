@vite(['resources/css/show.css', 'resources/css/global.css'])

<x-videos-app-layout>
    <div class="container">
        <!-- Títol de la sèrie -->

        <h1 class="title">{{ $serie->title }}</h1>

        <p class="description">{{ $serie->description }}</p>

        <ul class="info">
            <li><strong>Publicada el:</strong>
            {{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d/m/Y') : 'No especificada' }}
            <li>@if ($serie->user_name)
                    <div class="user-info">
                        @if ($serie->user_photo_url)
                            <img class="user-img" src="{{ $serie->user_photo_url }}" alt="Foto de perfil">
                        @else
                            <div class="user-img">
                                <p>{{ strtoupper(substr($serie->user_name, 0, 1)) }}</p>
                            </div>
                        @endif
                        <span>{{ $serie->user_name }}</span>
                    </div>
                @endif</li>
        </ul>
        <!-- Vídeos associats -->
        <h3 class="subtitle">Vídeos associats</h3>

        <div class="row">
            @forelse ($videos as $video)
                <x-video-card :video="$video"/>
            @empty
                <p>No hi ha series disponibles.</p>
            @endforelse
        </div>
        <!-- Botó de tornada -->
        <div class="mt-4 text-center">
            <a href="{{ route('series.index') }}" class="link">← Tornar a les Sèries</a>
        </div>
    </div>
</x-videos-app-layout>
