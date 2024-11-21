<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SMKN 4 Bogor</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    
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
        
        .gallery-item {
            margin-bottom: 30px;
        }
        
        .gallery-image {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        
        .gallery-image:hover {
            transform: translateY(-5px);
        }
        
        .gallery-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 15px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gallery-image:hover .gallery-caption {
            opacity: 1;
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
            <h1 class="display-4">Galeri Foto</h1>
            <p class="lead">Kumpulan foto kegiatan dan momen di SMKN 4 Bogor</p>
        </div>
    </header>

    <!-- Gallery -->
    <div class="container mb-5">
        <div class="row">
            @forelse($galleries as $gallery)
                @if($gallery->images->isNotEmpty())
                    @foreach($gallery->images as $image)
                        <div class="col-md-6 col-lg-4 gallery-item">
                            <div class="gallery-image">
                                <a href="{{ asset('images/' . $image->file) }}" 
                                   data-lightbox="gallery" 
                                   data-title="{{ $gallery->post->title ?? 'Untitled' }}">
                                    <img src="{{ asset('images/' . $image->file) }}" 
                                         alt="{{ $gallery->post->title ?? 'Gallery Image' }}">
                                </a>
                                <div class="gallery-caption">
                                    <h5 class="mb-1">{{ $gallery->post->title ?? 'Untitled' }}</h5>
                                    <p class="mb-0">{{ $image->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada foto yang ditambahkan</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links() }}
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html> 