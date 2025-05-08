@vite(['resources/css/responsive-table.css', 'resources/css/global.css'])



<x-videos-app-layout>
    <div class="container">
        <h1>Gestió d'Usuaris</h1>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="button">
            <a href="{{ route('users.manage.create') }}">Crear Usuari</a>
        </div>


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
                        <td data-label="ID">{{ $user->id }}</td>
                        <td data-label="Nom">{{ $user->name }}</td>
                        <td data-label="Email">{{ $user->email }}</td>
                        <td data-label="Rol">{{ $user->getRoleNames()->first() }}</td>

                        <td>
                            <button
                                onclick="window.location.href='{{ route('users.manage.edit', $user) }}'"
                                class="btn btn-warning btn-sm"
                            >
                                Editar
                            </button>
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
</x-videos-app-layout>
