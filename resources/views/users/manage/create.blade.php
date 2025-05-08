@vite(['resources/css/form.css', 'resources/css/global.css'])

<x-videos-app-layout>
    <div class="container">
        <h1>Crear Usuari</h1>

        @if($errors->any())
            <div class="alert">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
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
</x-videos-app-layout>
