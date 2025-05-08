@vite(['resources/css/page.css', 'resources/css/global.css'])


<x-videos-app-layout>

    <div class="container">

        @if (session('success'))
            <div class="alert ">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('users.index') }}" class="search" method="GET">
            <input type="text" name="search" placeholder="Cerca per títol de la sèrie..."
                   value="{{ request('search') }}">
            <button type="submit">
            </button>
        </form>


        <div class="row">
            @forelse($users as $user)
                <x-user-card :user="$user"/>
            @empty
                <p>No hi ha usuaris disponibles.</p>
            @endforelse
        </div>
    </div>
</x-videos-app-layout>
