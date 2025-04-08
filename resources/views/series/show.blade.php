<x-videos-app-layout>
    <div class="container">
        <!-- Títol de la sèrie -->
        <h1 class="mb-3 text-center">{{ $serie->title }}</h1>

        <!-- Descripció de la sèrie -->
        <div class="mb-4 text-center">
            <p style="font-size: 16px; color: #444;">{{ $serie->description }}</p>
        </div>

        <!-- Detalls -->
        <div class="d-flex justify-content-center gap-4 mb-5 text-muted" style="font-size: 14px;">
            <div>
                <strong>Publicada el:</strong>
                {{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d/m/Y') : 'No especificada' }}
            </div>
            @if($serie->user_name)
                <div class="d-flex align-items-center gap-2">
                    @if($serie->user_photo_url)
                        <img src="{{ $serie->user_photo_url }}" alt="Usuari"
                             class="rounded-circle" width="28" height="28" style="object-fit: cover;">
                    @endif
                    <span><strong>Creada per:</strong> {{ $serie->user_name }}</span>
                </div>
            @endif
        </div>

        <!-- Missatge d'èxit -->
        @if(session('success'))
            <div class="alert alert-success mt-3 text-center">{{ session('success') }}</div>
        @endif

        <!-- Vídeos associats -->
        <h3 class="mb-4">Vídeos associats</h3>

        @if($videos->isEmpty())
            <p class="text-muted">No hi ha vídeos associats a aquesta sèrie.</p>
        @else
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card border-0 shadow-sm rounded"
                             onclick="window.location='{{ route('videos.show', $video->id) }}'">

                            <iframe class="card-img-top" width="560" height="315"
                                    src="{{ $video->url }}?autoplay=0"
                                    title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen
                                    style="pointer-events: none;"></iframe>

                            <div class="card-body p-2">
                                <h5 class="card-title text-truncate" style="font-size: 14px; font-weight: 600;">{{ $video->title }}</h5>
                                <p class="card-text text-truncate" style="font-size: 12px; color: #606060;">
                                    {{ \Str::limit($video->description, 60) }}
                                </p>
                                <p class="text-muted mb-1" style="font-size: 12px;">
                                    Publicat el: {{ $video->created_at->format('d/m/Y') }}
                                </p>
                                <a href="{{ route('videos.show', $video) }}" class="btn btn-outline-primary btn-sm">Veure Detalls</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Botó de tornada -->
        <div class="mt-4 text-center">
            <a href="{{ route('series.index') }}" class="btn btn-secondary">← Tornar a les Sèries</a>
        </div>
    </div>

    <!-- Estils CSS -->
    <style>
        .container {
            padding: 50px;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
        }

        .card {
            border: none;
            display: flex;
            flex-direction: column;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-title {
            font-size: 14px;
            font-weight: 600;
        }

        .card-text {
            font-size: 12px;
            color: #606060;
        }

        .btn-outline-primary {
            border-color: #0069d9;
            color: #0069d9;
            font-size: 12px;
        }

        .btn-outline-primary:hover {
            background-color: #0069d9;
            color: #fff;
        }

        @media (max-width: 576px) {
            .card-img-top {
                height: 150px;
            }

            .card-title {
                font-size: 13px;
            }

            .card-text {
                font-size: 11px;
            }
        }
    </style>
</x-videos-app-layout>
