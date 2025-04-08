<x-videos-app-layout>
    <div class="container">
        <h1>Editar Sèrie: {{ $serie->title }}</h1>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('series.manage.update', $serie) }}" method="POST" data-qa="edit-series-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $serie->title) }}" required data-qa="input-title">
            </div>

            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea name="description" class="form-control" required data-qa="input-description">{{ old('description', $serie->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Imatge (Opcional)</label>
                <input type="file" name="image" class="form-control" data-qa="input-image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-create-user">Actualizar Sèrie</button>
            </div>
        </form>
    </div>

    <style>
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
        }

        .btn-create-user:hover {
            background-color: #0056b3;
        }
    </style>
</x-videos-app-layout>
