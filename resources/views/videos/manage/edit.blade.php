<x-videos-app-layout>
    <div class="container">
        <h1>Editar Vídeo</h1>

        <form action="{{ route('videos.manage.update', $video->id) }}" method="POST" data-qa="video-edit-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control" id="description" name="description">{{ $video->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" id="url" name="url" value="{{ $video->url }}" required>
            </div>

            <div class="form-group">
                <label for="published_at">Data de publicació</label>
                <input type="date" class="form-control" id="published_at" name="published_at" value="{{ \Carbon\Carbon::parse($video->published_at)->format('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="previous">Vídeo anterior</label>
                <input type="text" class="form-control" id="previous" name="previous" value="{{ $video->previous }}">
            </div>

            <div class="form-group">
                <label for="next">Vídeo següent</label>
                <input type="text" class="form-control" id="next" name="next" value="{{ $video->next }}">
            </div>

            <div class="form-group">
                <label for="series_id">Sèrie</label>
                <select class="form-control" id="series_id" name="series_id">
                    <option value="">Selecciona una sèrie</option>
                    @foreach ($series as $serie)
                        <option value="{{ $serie->id }}" {{ $serie->id == $video->series_id ? 'selected' : '' }}>
                            {{ $serie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-edit-video mt-3">Actualitzar Vídeo</button>
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

        /* Estil per als inputs i formularis */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #0069d9;
        }

        /* Estil per al botó d'editar vídeo */
        .btn-edit-video {
            background-color: #ffc107;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-edit-video:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        /* Estils per la taula i elements del formulari */
        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        /* Mida màxima per a dispositius més petits */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn-edit-video, .btn-warning {
                font-size: 14px;
                padding: 10px 15px;
            }

            .form-control {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</x-videos-app-layout>
