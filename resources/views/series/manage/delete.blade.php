<x-videos-app-layout>
    <div class="container">
        <h1>Eliminar Sèrie: {{ $serie->title }}</h1>

        <p>Estàs a punt d'eliminar aquesta sèrie. Si la sèrie té vídeos associats, aquests es desassignaran de manera automàtica. Vols continuar?</p>

        <form action="{{ route('series.manage.destroy', $serie) }}" method="POST" data-qa="delete-series-form">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar Sèrie</button>
            <a href="{{ route('series.manage.index') }}" class="btn btn-secondary">Cancel·lar</a>
        </form>
    </div>

    <style>
        .container {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 5px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 5px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</x-videos-app-layout>
