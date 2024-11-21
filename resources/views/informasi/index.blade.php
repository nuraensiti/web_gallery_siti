<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Terkini - SMKN 4 Bogor</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #0d47a1;
            --accent-color: #2196f3;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }
        
        .navbar {
            background: rgba(255,255,255,0.98) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 100px 0 50px;
            margin-bottom: 40px;
        }
        
        .info-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        .info-image {
            height: 200px;
            object-fit: cover;
        }
        
        .info-date {
            color: var(--accent-color);
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logoSMKN4.svg') }}" alt="SMKN 4 Bogor" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Kembali ke Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="page-header">
        <div class="container">
            <h1 class="display-4">Informasi Terkini</h1>
            <p class="lead">Berita dan informasi terbaru dari SMKN 4 Bogor</p>
        </div>
    </header>

    <!-- Informasi List -->
    <div class="container mb-5">
        <div class="row">
            @forelse($informasi as $info)
                <div class="col-md-6 col-lg-4">
                    <div class="info-card">
                        @if($info->galleries && $info->galleries->isNotEmpty() && $info->galleries->first()->images->isNotEmpty())
                            <img src="{{ asset('images/' . $info->galleries->first()->images->first()->file) }}" 
                                 class="card-img-top info-image" 
                                 alt="{{ $info->title }}">
                        @endif
                        <div class="p-4">
                            <div class="info-date mb-2">
                                {{ $info->created_at->format('d F Y') }}
                            </div>
                            <h4>{{ $info->title }}</h4>
                            <p class="text-muted">{{ Str::limit($info->content, 150) }}</p>
                            <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#infoModal{{ $info->id }}">
                                Baca selengkapnya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal for each info -->
                <div class="modal fade" id="infoModal{{ $info->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $info->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if($info->galleries && $info->galleries->isNotEmpty())
                                            <div id="carousel{{ $info->id }}" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach($info->galleries->first()->images as $index => $image)
                                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('images/' . $image->file) }}" 
                                                                 class="d-block w-100 rounded" 
                                                                 alt="{{ $image->title }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if($info->galleries->first()->images->count() > 1)
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $info->id }}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $info->id }}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </button>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p class="info-date mb-3">{{ $info->created_at->format('d F Y') }}</p>
                                        <p>{{ $info->content }}</p>
                                        <p class="mt-3"><strong>Status:</strong> {{ $info->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada informasi yang ditambahkan</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $informasi->links() }}
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 