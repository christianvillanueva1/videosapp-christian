<x-videos-app-layout>
    <div class="container">
        <h1>Gestió de Sèries</h1>

        <!-- Botó destacat per crear sèrie -->
        <a href="{{ route('series.manage.create') }}" class="btn btn-create-series mb-3" data-qa="create-series">Crear Sèrie</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

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
                        <td>{{ \Str::limit($serie->description, 50) }}</td>
                        <td>{{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d-m-Y') : 'No publicat' }}</td>
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

        .btn-create-series {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-create-series:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .alert {
            font-size: 14px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
        }

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

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 12px;
            }
            .btn-create-series, .btn-warning, .btn-danger {
                font-size: 12px;
                padding: 6px 12px;
            }
        }
    </style>
</x-videos-app-layout>
