<x-videos-app-layout>

    <div class="container">
        <h1>Editar Usuari</h1>

        <form action="{{ route('users.manage.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control input-edit" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control input-edit" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-update">Actualitzar</button>
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

        .form-group label {
            font-size: 16px;
            color: #555;
        }

        .input-edit {
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: border 0.3s ease;
        }

        .input-edit:focus {
            border-color: #0069d9;
            outline: none;
        }

        .btn-update {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-update:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Estil per als inputs */
        .form-group {
            margin-bottom: 20px;
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
