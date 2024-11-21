<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMKN 4 Bogor - Sekolah Menengah Kejuruan Negeri</title>
    <meta name="description" content="Website resmi SMKN 4 Bogor - Sekolah kejuruan unggulan di Kota Bogor">
    <meta name="keywords" content="smkn 4 bogor, sekolah kejuruan bogor, pendidikan vokasi">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #0d47a1;
            --accent-color: #2196f3;
            --text-light: #ffffff;
            --text-dark: #212121;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Navbar Styles */
        .navbar {
            background: rgba(255,255,255,0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        .navbar-brand img {
            height: 55px;
            transition: transform 0.3s;
        }
        
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        
        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 10px 20px !important;
            border-radius: 25px;
            transition: all 0.4s ease;
        }
        
        .nav-link:hover {
            color: var(--accent-color) !important;
            background: rgba(33, 150, 243, 0.1);
        }
        
        .nav-link.active {
            color: var(--accent-color) !important;
            font-weight: 600;
        }
        
        /* Banner Section */
        .banner_section {
            background: linear-gradient(135deg, rgba(26, 35, 126, 0.9), rgba(13, 71, 161, 0.9)), url('{{ asset('images/smkn4bogor_2.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .banner_section::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('{{ asset('images/smkn4bogor_2.jpg') }}');
            opacity: 0.1;
        }
        
        .banner_taital {
            font-size: 4rem;
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            line-height: 1.2;
        }
        
        .banner_text {
            color: rgba(255,255,255,0.9);
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }
        
        /* Button Styles */
        .btn-custom {
            background: var(--accent-color);
            color: var(--text-light);
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
            transition: all 0.4s;
        }
        
        .btn-custom:hover {
            background: var(--secondary-color);
            color: var(--text-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.5);
        }
        
        /* Section Styles */
        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 3.5rem;
            text-align: center;
            position: relative;
            padding-bottom: 20px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        
        .card-img-top {
            transition: transform 0.8s;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .card-title {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        /* Footer Styles */
        .footer_section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 80px 0 60px;
            position: relative;
        }
        
        .footer_section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset('images/pattern.png') }}');
            opacity: 0.05;
        }
        
        .footer_section h4 {
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .footer_section h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 2px;
        }
        
        .social-links a {
            color: var(--text-light);
            font-size: 1.2rem;
            margin-right: 20px;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }
        
        /* Responsive Styles */
        @media (max-width: 991px) {
            .banner_taital {
                font-size: 3.2rem;
            }
            
            .banner_text {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2.4rem;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 0;
            }
            
            .banner_taital {
                font-size: 2.8rem;
            }
            
            .banner_text {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
                margin-bottom: 2.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .banner_section {
                min-height: 80vh;
            }
            
            .banner_taital {
                font-size: 2.3rem;
            }
            
            .btn-custom {
                padding: 10px 25px;
            }
        }
        
        .modal-content {
            border: none;
            border-radius: 15px;
        }
        
        .modal-header {
            border-bottom: 1px solid rgba(0,0,0,0.1);
            background-color: var(--primary-color);
            color: white;
            border-radius: 15px 15px 0 0;
        }
        
        .modal-footer {
            border-top: 1px solid rgba(0,0,0,0.1);
        }
        
        .carousel-item img {
            max-height: 400px;
            object-fit: cover;
        }
        
        .img-thumbnail {
            transition: transform 0.2s;
        }
        
        .img-thumbnail:hover {
            transform: scale(1.05);
        }
        
        .carousel-caption {
            left: 0;
            right: 0;
            bottom: 0;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/logoSMKN4.svg" alt="SMKN 4 Bogor">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#informasi">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                    @auth
    <li class="nav-item">
        <a class="nav-link btn btn-custom ms-2" href="/admin">DASHBOARD</a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link btn btn-custom ms-2" href="http://127.0.0.1:8000/login">LOGIN</a>
    </li>
@endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <section class="banner_section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="banner_taital">Selamat Datang di SMKN 4 Bogor</h1>
                    <p class="banner_text">Membentuk generasi unggul yang terampil, profesional, dan berkarakter untuk masa depan Indonesia yang lebih baik.</p>
                    <a href="#informasi" class="btn btn-custom">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Section -->
    <section class="py-5" id="informasi">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Informasi Terkini</h2>
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                    @if ($informasiPost)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{ $informasiPost->title }}</h3>
                                <p class="card-text">{{ Str::limit($informasiPost->content, 200) }}</p>
                                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#infoModal">
                                    Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">Belum ada informasi terkini.</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                    @if($informasiPost && $informasiPost->galleries && $informasiPost->galleries->isNotEmpty())
                        @foreach($informasiPost->galleries->first()->images as $image)
                            <img src="{{ asset('images/' . $image->file) }}" 
                                 alt="{{ $informasiPost->title }}"
                                 class="img-fluid rounded shadow">
                            @break
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('informasi.index') }}" class="btn btn-custom">Lihat Semua Informasi</a>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-5 bg-light" id="galeri">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Galeri Sekolah</h2>
            <div class="row g-4">
                @forelse($galleries as $gallery)
                    @if($gallery->images->isNotEmpty())
                        @foreach($gallery->images as $image)
                            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                                <div class="card h-100">
                                    <img src="{{ asset('images/' . $image->file) }}" 
                                         class="card-img-top" 
                                         alt="{{ $gallery->post->title ?? 'Gallery Image' }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $gallery->post->title ?? 'Untitled' }}</h5>
                                        <p class="card-text">{{ $image->title ?? '' }}</p>
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
            <div class="text-center mt-4">
                <a href="{{ route('galeri.index') }}" class="btn btn-custom">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section class="py-5" id="agenda">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Agenda Sekolah</h2>
            <div class="row">
                @forelse($agendaPosts as $agenda)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">{{ $agenda->title }}</h4>
                                <p class="card-text">{{ $agenda->content }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada agenda yang ditambahkan</p>
                    </div>
                @endforelse
            </div>
            @if($agendaPosts->isNotEmpty())
                <div class="text-center mt-4">
                    <a href="{{ route('agenda.index') }}" class="btn btn-custom">Lihat Semua Agenda</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Peta Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Lokasi Sekolah</h2>
            <div class="card" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-body p-0">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4584587066087!2d106.82212897462385!3d-6.640733393435931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1710900646439!5m2!1sid!2sid"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h4>Tentang Kami</h4>
                    <p>SMKN 4 Bogor adalah sekolah kejuruan unggulan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja.</p>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <h4>Kontak</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Tajur, Bogor</li>
                        <li><i class="fas fa-phone me-2"></i> (0251) 8242411</li>
                        <li><i class="fas fa-envelope me-2"></i> info@smkn4bogor.sch.id</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <h4>Media Sosial</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="py-3 bg-dark text-center text-white">
        <div class="container">
            <small>Copyright © 2024 SMKN 4 Bogor. All rights reserved.</small>
        </div>
    </div>

    <!-- Modal -->
    @if($informasiPost)
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">{{ $informasiPost->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            @if($informasiPost->galleries && $informasiPost->galleries->isNotEmpty())
                                <div id="infoCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($informasiPost->galleries->first()->images as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset('images/' . $image->file) }}" 
                                                     class="d-block w-100 rounded" 
                                                     alt="{{ $image->title }}">
                                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                                    <h6>{{ $image->title }}</h6>
                                                    <p class="small">Status: {{ $informasiPost->status }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if($informasiPost->galleries->first()->images->count() > 1)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-3">
                                    <h6 class="text-muted">Deskripsi:</h6>
                                    <p>{{ $informasiPost->content }}</p>
                                </div>
                                @if($informasiPost->galleries && $informasiPost->galleries->isNotEmpty())
                                    <div class="mt-auto">
                                        <h6 class="text-muted mb-3">Foto Terkait:</h6>
                                        <div class="row g-2">
                                            @foreach($informasiPost->galleries->first()->images as $image)
                                                <div class="col-4">
                                                    <img src="{{ asset('images/' . $image->file) }}" 
                                                         class="img-thumbnail" 
                                                         alt="{{ $image->title }}"
                                                         style="cursor: pointer;"
                                                         onclick="showImage({{ $loop->index }})">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true,
            offset: 100
        });
        
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Navbar active state
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");
        
        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href") === `#${current}`) {
                    link.classList.add("active");
                }
            });
        });
        
        function showImage(index) {
            const carousel = new bootstrap.Carousel(document.getElementById('infoCarousel'));
            carousel.to(index);
        }
    </script>
</body>

</html>
