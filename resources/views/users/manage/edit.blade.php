@vite(['resources/css/form.css', 'resources/css/global.css'])


<x-videos-app-layout>

    <div class="container">
        <h1>Editar Usuari: {{$user->name}}</h1>

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
</x-videos-app-layout>
