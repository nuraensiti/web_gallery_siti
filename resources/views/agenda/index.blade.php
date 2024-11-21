<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda SMKN 4 Bogor</title>
    
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
        
        .agenda-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            margin-bottom: 30px;
        }
        
        .agenda-card:hover {
            transform: translateY(-5px);
        }
        
        .agenda-date {
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
            <h1 class="display-4">Agenda Sekolah</h1>
            <p class="lead">Daftar lengkap agenda dan kegiatan SMKN 4 Bogor</p>
        </div>
    </header>

    <!-- Agenda List -->
    <div class="container mb-5">
        <div class="row">
            @forelse($agendas as $agenda)
                <div class="col-md-6 col-lg-4">
                    <div class="agenda-card p-4">
                        <div class="agenda-date mb-2">
                            {{ $agenda->created_at->format('d F Y') }}
                        </div>
                        <h4>{{ $agenda->title }}</h4>
                        <p class="text-muted">{{ Str::limit($agenda->content, 150) }}</p>
                        <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#agendaModal{{ $agenda->id }}">
                            Baca selengkapnya
                        </button>
                    </div>
                </div>

                <!-- Modal for each agenda -->
                <div class="modal fade" id="agendaModal{{ $agenda->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $agenda->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="agenda-date mb-3">{{ $agenda->created_at->format('d F Y') }}</p>
                                <p>{{ $agenda->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada agenda yang ditambahkan</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $agendas->links() }}
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 