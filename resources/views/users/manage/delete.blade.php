<x-videos-app-layout>
    <div class="container">
        <h1>Eliminar Usuari</h1>

        <p>Estàs segur que vols eliminar l'usuari <strong>{{ $user->name }}</strong>?</p>

        <form action="{{ route('users.manage.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-delete-user">Sí, eliminar</button>
            <a href="{{ route('users.manage.index') }}" class="btn btn-secondary btn-cancel">Cancel·lar</a>
        </form>
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

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        strong {
            font-weight: 600;
            color: #333;
        }

        /* Botó per eliminar usuari */
        .btn-delete-user {
            background-color: #dc3545;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
            margin-right: 10px;
        }

        .btn-delete-user:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        /* Botó per cancel·lar */
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        /* Estil per a la taula de confirmació */
        form {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .alert-danger {
            font-size: 14px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</x-videos-app-layout>
