<x-videos-app-layout>
    <div class="video-container">
        <h1 class="video-title">Títol: {{ $video['title'] }}</h1>
        <p class="video-description">Descripció: {{ $video['description'] }}</p>
        <div class="video-frame">
            <iframe
                src="{{ $video['url'] }}"
                width="800"
                height="450"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        <a href="{{ $video['url'] }}" target="_blank" class="video-link">Mira el vídeo en una nova finestra</a>
        <ul class="video-info">
            <li>Data de publicació: {{ $video['published_at'] }}</li>
            <li>Anterior vídeo: {{ $video['previous'] }}</li>
            <li>Següent vídeo: {{ $video['next'] }}</li>
            <li>ID de la sèrie: {{ $video['series_id'] }}</li>
        </ul>
    </div>
</x-videos-app-layout>

<style>
    .video-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .video-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .video-description {
        font-size: 16px;
        margin-bottom: 20px;
        color: #555;
    }

    .video-frame {
        margin-bottom: 20px;
        text-align: center;
    }

    .video-link {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .video-link:hover {
        background-color: #0056b3;
    }

    .video-info {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .video-info li {
        font-size: 14px;
        margin-bottom: 5px;
        color: #666;
    }

</style>
