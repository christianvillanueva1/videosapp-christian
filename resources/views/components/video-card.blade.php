@vite(['resources/css/video.css', 'resources/css/global.css'])

<div class="main-video-div" onclick="window.location='{{ route('videos.show', $video->id) }}'">
    <!-- Miniatura com a imatge destacada -->
    <iframe  src="{{ $video->url }}?autoplay=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="pointer-events: none;"></iframe>

    <div class="video-data-info">
        <h5 >{{ $video->title }}</h5>
        <p>{{ \Str::limit($video->description, 60) }}</p>
    </div>
</div>
