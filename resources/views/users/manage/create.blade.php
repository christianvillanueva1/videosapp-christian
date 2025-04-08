<x-videos-app-layout>
    <div class="container">
        <h1>Crear Usuari</h1>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.manage.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" data-qa="input-name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" data-qa="input-email" required>
            </div>

            <div class="form-group">
                <label for="password">Contrasenya</label>
                <input type="password" name="password" class="form-control" data-qa="input-password" required>
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-create-user">Crear</button>
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

        /* Estil per a l'alerta d'errors */
        .alert-danger {
            font-size: 14px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Estil per als camps de formulari */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #0069d9;
            box-shadow: 0 0 8px rgba(0, 105, 217, 0.6);
        }
    </style>
</x-videos-app-layout>
