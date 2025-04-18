<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>
    <style>
        /* Header Styles */
        .app-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .app-header-title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #444;
            padding: 10px 0;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .navbar-nav li {
            display: inline;
            margin: 0 15px;
        }

        .navbar-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
        }

        /* Footer Styles */
        .app-footer {
            background-color: #f8f9fa;
            color: #555;
            padding: 10px 20px;
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 30px;
        }

        .app-footer-text {
            font-size: 14px;
            margin: 0;
            color: #666;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
<header class="app-header">
    <h1 class="app-header-title">Videos App - Christian Villanueva Lor</h1>
</header>

<!-- Navbar -->
<nav class="navbar">
    <ul class="navbar-nav">
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

<main>
    {{ $slot }}
</main>

<footer class="app-footer">
    <p class="app-footer-text">&copy; {{ date('Y') }} Videos App | Christian Villanueva Lor</p>
</footer>
</body>
</html>
