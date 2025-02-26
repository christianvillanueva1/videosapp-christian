<x-videos-app-layout>
    <div class="container">
        <h1>Crear Vídeo</h1>

        <form action="{{ route('videos.manage.store') }}" method="POST" data-qa="video-create-form">
            @csrf
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>

            <div class="form-group">
                <label for="published_at">Data de publicació</label>
                <input type="date" class="form-control" id="published_at" name="published_at" required>
            </div>

            <div class="form-group">
                <label for="previous">Vídeo anterior</label>
                <input type="text" class="form-control" id="previous" name="previous">
            </div>

            <div class="form-group">
                <label for="next">Vídeo següent</label>
                <input type="text" class="form-control" id="next" name="next">
            </div>

            <div class="form-group">
                <label for="series_id">Sèrie</label>
                <input type="number" class="form-control" id="series_id" name="series_id">
            </div>

            <button type="submit" class="btn btn-create-video mt-3">Crear Vídeo</button>
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

        /* Estil per al botó de crear vídeo */
        .btn-create-video {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-create-video:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        /* Estils per la taula i elements del formulari */
        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Mida màxima per a dispositius més petits */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn-create-video, .btn-success {
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
