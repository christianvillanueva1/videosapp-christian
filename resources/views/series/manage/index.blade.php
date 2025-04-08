<x-videos-app-layout>
    <div class="container">
        <h1>Gestió de Sèries</h1>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Botó per crear una nova sèrie -->
        <a href="{{ route('series.manage.create') }}" class="btn btn-create-user mb-3" data-qa="create-series">Crear Sèrie</a>

        <!-- Taula de sèries -->
        <div class="table-responsive">
            <table class="table table-striped mt-3">
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
                        <td>{{ $serie->title }}</td>
                        <td>{{ $serie->description }}</td>
                        <td>{{ $serie->published_at ? $serie->published_at : 'No publicat' }}</td>
                        <td>
                            <a href="{{ route('series.manage.edit', $serie) }}" class="btn btn-warning btn-sm" data-qa="edit-series-{{ $serie->id }}">Editar</a>

                            <form action="{{ route('series.manage.destroy', $serie) }}" method="POST" style="display:inline;" data-qa="delete-series-{{ $serie->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur que vols eliminar aquesta sèrie? Els vídeos associats també seran desassignats.')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Estils per la taula */
        .container {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

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
    </style>
</x-videos-app-layout>
