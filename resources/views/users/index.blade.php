<x-videos-app-layout>

    <div class="container">
        <h1>Llista d'Usuaris</h1>

        <form method="GET" action="{{ route('users.index') }}" class="search-form mb-3">
            <div class="search-bar">
                <input type="text" name="search" class="search-input" placeholder="Cerca un usuari..." value="{{ request('search') }}">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="user-list">
            @foreach($users as $user)
                <div class="user-card">
                    <div class="user-avatar">
                        @if($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}'s photo" class="avatar-img">
                        @else
                            <div class="avatar-placeholder">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        @endif
                    </div>
                    <div class="user-info">
                        <h5 class="user-name">{{ $user->name }}</h5>
                        <p class="user-email">{{ $user->email }}</p>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Veure Detall</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $users->links() }}
    </div>

    <!-- Estils CSS -->
    <style>
        .container {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .search-bar {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: 24px;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        .search-input {
            width: 100%;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: transparent;
            outline: none;
            border-radius: 24px;
        }

        .search-btn {
            position: absolute;
            right: 10px;
            background: transparent;
            border: none;
            color: #333;
            font-size: 20px;
            cursor: pointer;
        }

        .search-btn:hover {
            color: #007bff;
        }

        .user-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .user-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .user-card:hover {
            transform: scale(1.05);
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            position: relative;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            width: 100%;
            height: 100%;
            background-color: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-name {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .user-email {
            font-size: 14px;
            color: #555;
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

        .pagination {
            justify-content: center;
            margin-top: 30px;
        }

        /* Estilos Font Awesome para el icono de búsqueda */
        .fa-search {
            font-size: 18px;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .user-card {
                flex-direction: column;
                text-align: center;
            }

            .user-avatar {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .search-bar {
                width: 100%;
            }
        }
    </style>

</x-videos-app-layout>
