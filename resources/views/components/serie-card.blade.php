@vite(['resources/css/serie.css', 'resources/css/global.css'])


<div class="main-serie-div" onclick="window.location='{{ route('series.show', $serie->id) }}'">
    @if($serie->image)
        <div class="image">
            🎬
        </div>
    @else
        <div class="image">
            🎬
        </div>
    @endif
    <div class="serie-info">
        {{-- Títol i descripció --}}
        <h5>{{ $serie->title }}</h5>
        <p>{{ \Str::limit($serie->description, 60) }}</p>

        {{-- Informació de publicació --}}
        <p>
            {{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d/m/Y') : 'No publicada' }}
        </p>

        {{-- Informació de l'usuari --}}
        @if ($serie->user_name)
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
        @endif
    </div>
</div>
