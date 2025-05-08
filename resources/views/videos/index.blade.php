@vite(['resources/css/page.css', 'resources/css/global.css'])

<x-videos-app-layout>
    @if (session('success'))
        <div class="alert ">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="top">
        @if (Auth::check())
            <div class="button">
                <a href="{{ route('videos.create') }}">Crear Vídeo</a>
            </div>
        @endif

    </div>
    <div class="row">
        @forelse ($videos as $video)
            <x-video-card :video="$video"/>
        @empty
            <p>No hi ha series disponibles.</p>
        @endforelse

    </div>
</x-videos-app-layout>
