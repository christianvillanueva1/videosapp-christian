<x-videos-app-layout>
    <div class="container">
        <h1>Gestió d'Usuaris</h1>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Botó destacat per crear usuari -->
        <a href="{{ route('users.manage.create') }}" class="btn btn-create-user mb-3">Crear Usuari</a>

        <!-- Taula que ocupa tota l'amplada disponible -->
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->first() }}</td>

                        <td>
                            <a href="{{ route('users.manage.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('users.manage.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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

        /* Estil per al botó de crear usuari */
        .btn-create-user {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-create-user:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .alert {
            font-size: 14px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
        }

        /* Taula i estil de les cel·les */
        .table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        .table th {
            background-color: #0069d9;
            color: white;
            font-weight: 600;
        }

        .table td {
            padding: 12px 15px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table td a {
            color: #0069d9;
            text-decoration: none;
        }

        .table td a:hover {
            text-decoration: underline;
        }

        .btn-warning, .btn-danger {
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Estil per fer la taula més responsive */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 12px;
            }
            .btn-primary, .btn-warning, .btn-danger {
                font-size: 12px;
                padding: 6px 12px;
            }
        }
    </style>
</x-videos-app-layout>
