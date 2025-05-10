@vite(['resources/css/page.css', 'resources/css/global.css'])

<x-videos-app-layout>
    <div class="container">
        <!-- Missatge d'èxit -->
        @if (session('success'))
            <div class="alert ">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="top">
            @if (Auth::check())
                <div class="button">
                    <a href="{{ route('series.create') }}">Crear Serie</a>
                </div>
            @endif

        </div>

        <form action="{{ route('series.index') }}" class="search" method="GET">
            <input type="text" name="search" placeholder="Cerca per títol de la sèrie..."
                   value="{{ request('search') }}">
            <button type="submit">
            </button>
        </form>

        <!-- Llistat de targetes de sèries -->
        <div class="row">
            @forelse ($series as $serie)
                <x-serie-card :serie="$serie"/>
            @empty
                <p>No hi ha series disponibles.</p>
            @endforelse
        </div>
    </div>

</x-videos-app-layout>
