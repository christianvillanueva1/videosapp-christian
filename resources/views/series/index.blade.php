<x-videos-app-layout>
    <div class="container">
        <h1>Gestió de Sèries</h1>

        <!-- Missatge d'èxit -->
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Formulari de cerca -->
        <form action="{{ route('series.index') }}" method="GET" class="mb-4">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cerca per títol de la sèrie..." value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary">Cercar</button>
        </form>

        <!-- Taula de sèries -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Data de Publicació</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->id }}</td>
                        <td><a href="{{ route('series.show', $serie) }}">{{ $serie->title }}</a></td>
                        <td>{{ $serie->description }}</td>
                        <td>{{ $serie->published_at ? : 'No especificada' }}</td>
                        <td>
                            <a href="{{ route('series.show', $serie->id) }}" class="btn btn-info btn-sm">Veure Vídeos</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-videos-app-layout>
