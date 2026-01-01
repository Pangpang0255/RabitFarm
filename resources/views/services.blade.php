<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kami - RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: white; 
        }
        header { 
            background-color: white; 
            padding: 15px 0; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1000;
        }
        .navbar-brand { color: #228B22 !important; font-weight: bold; font-size: 24px; }
        .nav-link { color: #333 !important; margin: 0 15px; }
        .nav-link:hover { color: #228B22 !important; }
        .dropdown-menu { border: 1px solid #ddd; }
        
        .hero-services {
            position: relative;
            height: 300px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920') center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-services h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .breadcrumb-custom {
            background: transparent;
            margin: 0;
            padding: 0;
        }
        .breadcrumb-custom a {
            color: #32CD32;
            text-decoration: none;
        }
        .breadcrumb-custom span {
            color: white;
        }
        
        .services-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .services-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .services-header h3 {
            color: #228B22;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .services-header h2 {
            color: #333;
            font-size: 36px;
            font-weight: bold;
        }
        
        .service-card {
            background: white;
            padding: 40px 30px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 40px;
            transition: all 0.3s;
            border: 1px solid #e0e0e0;
            position: relative;
            height: auto; /* allow card to size to content now that icons are removed */
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; /* spacing between title and description */
        }
        .service-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }

        /* Make columns flex containers and ensure all service cards in a row have equal height */
        .services-section .row > [class*="col-"] {
            display: flex;
            align-items: stretch;
        }
        .services-section .row > [class*="col-"] .service-card {
            flex: 1 1 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .service-number {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #e0e0e0;
            font-size: 24px;
            font-weight: bold;
        }
        .service-icon {
            font-size: 60px;
            color: #228B22;
            margin-bottom: 20px;
        }
        .service-icon img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            display: inline-block;
        }
        .service-card h4 {
            color: #333;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .service-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 0;
        }
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #228B22;
            color: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            z-index: 1000;
        }
        .scroll-top:hover {
            background-color: #1a6b1a;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <span style="color: #228B22;">🐰 RABIT FARM</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Layanan Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forum">Forum Komunitas</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard Monitoring</a></li>
                                <li><a class="dropdown-item" href="/dashboard">Pencatatan Digital</a></li>
                                <li><a class="dropdown-item" href="/database-ternak">Database Ternak</a></li>
                                <li><a class="dropdown-item" href="/notifications">Notifikasi</a></li>
                                <li><a class="dropdown-item" href="/forum">Forum Komunitas</a></li>
                                <li><a class="dropdown-item" href="/reports">Laporan Keuangan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-services">
        <h1>Layanan Kami</h1>
        <div class="breadcrumb-custom">
            <a href="/">Home</a> <span>/</span> <span>Layanan Kami</span>
        </div>
    </div>

    <section class="services-section">
        <div class="container">
            <div class="services-header">
                <h3>LAYANAN KAMI</h3>
                <h2>Layanan Peternakan Kelinci Terlengkap</h2>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">01</span>
                    
                        <h4>Pemilihan Bibit</h4>
                        <p>Membantu Anda memilih bibit kelinci berkualitas unggul dengan genetika terbaik untuk hasil optimal</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">02</span>
                        
                        <h4>Manajemen Pakan</h4>
                        <p>Konsultasi nutrisi lengkap dan pengaturan pakan organik berkualitas tinggi untuk kelinci sehat</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">03</span>
                        
                        <h4>Kandang Modern</h4>
                        <p>Desain dan pembangunan kandang kelinci yang higienis, nyaman, dan sesuai standar peternakan</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">04</span>
                        
                        <h4>Monitoring Digital</h4>
                        <p>Sistem monitoring real-time untuk kesehatan, pertumbuhan, dan produktivitas kelinci Anda</p>
                    </div>
                </div>
            </div>


            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">05</span>
                        
                        <h4>Kesehatan Kelinci</h4>
                        <p>Program vaksinasi dan perawatan kesehatan rutin untuk mencegah penyakit pada kelinci</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">06</span>
                        
                        <h4>Breeding Program</h4>
                        <p>Manajemen perkawinan dan reproduksi kelinci untuk meningkatkan kualitas dan kuantitas</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">07</span>
                        
                        <h4>Sistem Air Bersih</h4>
                        <p>Instalasi sistem air minum otomatis yang higienis untuk memastikan kelinci tetap terhidrasi</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <span class="service-number">08</span>
                        
                        <h4>Pemasaran Produk</h4>
                        <p>Bantuan pemasaran dan distribusi hasil peternakan kelinci ke pasar yang tepat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">↑</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>