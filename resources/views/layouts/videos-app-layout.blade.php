<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/header_footer.css', 'resources/css/global.css'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>

</head>
<body>
<header class="app-header">
    <div class="app-header-title" onclick="window.location='{{ route('welcome') }}'">
        <img src="{{ asset('logo-app.png') }}" alt="Logo" class="app-logo">
        <h1 >Videos App</h1>
    </div>
    <nav class="navbar">
        <button class="navbar-toggler" id="navbarToggle">&#9776;</button>
        <ul class="navbar-nav" id="navbarMenu">
            <li><a href="{{ route('videos.index') }}">Videos</a></li>
            <li><a href="{{ route('series.index') }}">Series</a></li>

            @if (Auth::check())
                <li><a href="{{ route('users.index') }}">Usuaris</a></li>
            @endif
            @if (Auth::check() && Auth::user()->can('manage-users'))
                <li><a href="{{ route('users.manage.index') }}">Gestió de Usuaris</a></li>
            @endif
            @if (Auth::check() && Auth::user()->can('manage-videos'))
                <li><a href="{{ route('videos.manage.index') }}">Gestió de Vídeos</a></li>
            @endif
            @if (Auth::check() && Auth::user()->can('manage-series'))
                <li><a href="{{ route('series.manage.index') }}">Gestió de Series</a></li>
            @endif
            @if (Auth::check())
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Tancar Sessió</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('login') }}">Iniciar Sessió</a></li>
            @endif
        </ul>
    </nav>
</header>

<!-- Navbar -->


<main>
    {{ $slot }}
</main>

<footer class="app-footer">
    <p class="app-footer-text">&copy; {{ date('Y') }} Videos App | Christian Villanueva Lor</p>
</footer>

<!-- JavaScript para el toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('navbarToggle');
        const menu = document.getElementById('navbarMenu');

        toggleBtn.addEventListener('click', () => {
            menu.classList.toggle('show');
        });
    });
</script>
</body>
</html>
