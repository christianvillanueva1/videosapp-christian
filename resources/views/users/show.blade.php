<x-videos-app-layout>

    <div class="container">
        <h1>Detall de l'Usuari</h1>

        <div class="card user-info-card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            </div>
        </div>

        <h2 class="mt-4">Vídeos de l'Usuari</h2>

        @if($user->videos->count() > 0)
            <div class="videos-list">
                @foreach($user->videos as $video)
                    <div class="video-card">
                        <div class="video-iframe">
                            <iframe src="{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h5 class="video-title">{{ $video->title }}</h5>
                            <p class="video-description">{{ Str::limit($video->description, 100) }}...</p>
                            <p class="video-date"><strong>Publicat el:</strong> {{ $video->published_at }}</p>
                            <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info btn-sm">Veure Detall</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>L'usuari no té vídeos.</p>
        @endif
    </div>

    <!-- Estils CSS -->
    <style>
        .container {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        h1, h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .user-info-card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .videos-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .video-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .video-card:hover {
            transform: scale(1.05);
        }

        .video-iframe {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .video-iframe iframe {
            width: 100%;
            height: 100%;
        }

        .video-info {
            padding: 10px 0;
        }

        .video-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .video-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .video-date {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
        }

        .btn-info {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-info:hover {
            background-color: #0056b3;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .video-card {
                flex-direction: column;
                text-align: center;
            }

            .video-iframe {
                height: 180px;
            }

            .user-info-card {
                margin-bottom: 20px;
            }
        }
    </style>

</x-videos-app-layout>
