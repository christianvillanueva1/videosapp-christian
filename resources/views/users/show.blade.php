@vite(['resources/css/show.css', 'resources/css/global.css'])

<x-videos-app-layout>

    <div class="container">
        <h1 class="title">Detall de l'Usuari</h1>

        <div class="user-info">
            @if($user->profile_photo_url)
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}'s photo"
                     class="user-img">
            @else
                <div class="user-img">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            @endif
            <div class="subinfo">
                <span>{{ $user->name }}</span>
                <span>{{ $user->email }}</span>
            </div>
        </div>


        <h2 class="subtitle">Vídeos de l'Usuari</h2>


        <div class="row">
            @forelse ($user->videos as $video)
                <x-video-card :video="$video"/>
            @empty
                <p>No hi ha series disponibles.</p>
            @endforelse
        </div>
    </div>

</x-videos-app-layout>
