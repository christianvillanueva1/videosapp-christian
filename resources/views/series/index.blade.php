<x-videos-app-layout>
    <div class="container">
        <!-- Missatge d'èxit -->
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        @if (Auth::check())
            <div class="col-12 mb-3">
                <a href="{{ route('series.create') }}" class="btn btn-primary">Crear Serie</a>
            </div>
        @endif

        <!-- Formulari de cerca -->
        <form action="{{ route('series.index') }}" method="GET" class="mb-4">
            <div class="form-group mb-2">
                <input type="text" name="search" class="form-control" placeholder="Cerca per títol de la sèrie..."
                       value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Llistat de targetes de sèries -->
        <div class="row">
            @foreach ($series as $serie)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card border-0 shadow-sm rounded"
                         onclick="window.location='{{ route('series.show', $serie->id) }}'">

                        {{-- Imatge destacada de la sèrie o placeholder --}}
                        @if($serie->image)
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                 style="height: 180px; font-size: 48px; color: #aaa;">
                                🎬
                            </div>
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                 style="height: 180px; font-size: 48px; color: #aaa;">
                                🎬
                            </div>
                        @endif

                        {{-- Cos de la targeta --}}
                        <div class="card-body p-2">
                            {{-- Títol i descripció --}}
                            <h5 class="card-title text-truncate">{{ $serie->title }}</h5>
                            <p class="card-text text-truncate">{{ \Str::limit($serie->description, 60) }}</p>

                            {{-- Informació de publicació --}}
                            <p class="text-muted mb-1" style="font-size: 12px;">
                                {{ $serie->published_at ? \Carbon\Carbon::parse($serie->published_at)->format('d/m/Y') : 'No publicada' }}
                            </p>

                            {{-- Informació de l'usuari --}}
                            @if ($serie->user_name)
                                <div class="d-flex align-items-center mt-2">
                                    @if ($serie->user_photo_url)
                                        <img src="{{ $serie->user_photo_url }}" alt="Foto de perfil"
                                             class="rounded-circle me-2" width="24" height="24" style="object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary me-2 d-flex justify-content-center align-items-center"
                                             style="width: 24px; height: 24px; font-size: 12px; color: white;">
                                            {{ strtoupper(substr($serie->user_name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <span style="font-size: 12px; color: #333;">{{ $serie->user_name }}</span>
                                </div>
                            @endif

                            {{-- Botó --}}
                            <a href="{{ route('series.show', $serie->id) }}" class="btn btn-outline-primary btn-sm mt-2">Veure Detall</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Estils CSS -->
    <style>
        .container {
            padding: 50px;
        }

        .card-img-top {
            border-radius: 5px;
            cursor: pointer;
        }

        .card {
            border: none;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .card-text {
            font-size: 12px;
            color: #606060;
        }

        .btn-outline-primary {
            border-color: #0069d9;
            color: #0069d9;
            font-size: 12px;
        }

        .btn-outline-primary:hover {
            background-color: #0069d9;
            color: #fff;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Responsiu */
        @media (max-width: 1200px) {
            .col-lg-3 {
                flex: 1 1 48%;
            }
        }

        @media (max-width: 992px) {
            .col-md-4 {
                flex: 1 1 48%;
            }
        }

        @media (max-width: 768px) {
            .col-sm-6 {
                flex: 1 1 48%;
            }
        }

        @media (max-width: 576px) {
            .col-sm-6 {
                flex: 1 1 100%;
            }

            .card-title {
                font-size: 13px;
            }

            .card-text {
                font-size: 11px;
            }
        }
    </style>
</x-videos-app-layout>
