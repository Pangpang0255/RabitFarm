<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials - RabitFarm</title>
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
        
        .hero-testimonials {
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
        .hero-testimonials h1 {
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
        
        .testimonials-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .testimonials-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .testimonials-header h3 {
            color: #228B22;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .testimonials-header h2 {
            color: #333;
            font-size: 36px;
            font-weight: bold;
        }
        
        .testimonial-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
        }
        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
        }
        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .testimonial-text {
            color: #666;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 20px;
            font-style: italic;
        }
        .testimonial-name {
            color: #228B22;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }
        
        .newsletter-section {
            padding: 60px 0;
            background-color: white;
        }
        .newsletter-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .newsletter-content h3 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .newsletter-content p {
            color: #666;
            margin-bottom: 30px;
        }
        .newsletter-form {
            display: flex;
            gap: 10px;
        }
        .newsletter-form input {
            flex: 1;
            padding: 15px 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }
        .newsletter-form button {
            background-color: #228B22;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
        }
        .newsletter-form button:hover {
            background-color: #1a6b1a;
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
                        <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/services">Our Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="/notifications">Testimonials</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forum">Blog</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard Monitoring</a></li>
                                <li><a class="dropdown-item" href="/dashboard">Pencatatan Digital</a></li>
                                <li><a class="dropdown-item" href="/notifications">Notifikasi</a></li>
                                <li><a class="dropdown-item" href="/forum">Forum Komunitas</a></li>
                                <li><a class="dropdown-item" href="/reports">Laporan Keuangan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/reports">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-testimonials">
        <h1>Testimonials</h1>
        <div class="breadcrumb-custom">
            <a href="/">Home</a> <span>/</span> <span>Testimonials</span>
        </div>
    </div>

    <section class="testimonials-section">
        <div class="container">
            <div class="testimonials-header">
                <h3>TESTIMONIALS</h3>
                <h2>Testimoni Peternak Kelinci Kami</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmad Rizki">
                        </div>
                        <p class="testimonial-text">"RabitFarm sangat membantu saya dalam mengelola peternakan kelinci. Sistem monitoring digital memudahkan saya memantau kesehatan dan pertumbuhan kelinci secara real-time. Sangat direkomendasikan!"</p>
                        <div class="testimonial-name">AHMAD RIZKI</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Siti Nurhaliza">
                        </div>
                        <p class="testimonial-text">"Sejak menggunakan RabitFarm, produktivitas peternakan saya meningkat 40%. Platform ini sangat user-friendly dan fitur-fiturnya lengkap. Tim support juga sangat responsif dan membantu."</p>
                        <div class="testimonial-name">SITI NURHALIZA</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dewi Lestari">
                        </div>
                        <p class="testimonial-text">"Manajemen pakan dan breeding program dari RabitFarm sangat membantu mengoptimalkan hasil peternakan. Kualitas kelinci saya meningkat signifikan dan pemasaran produk jadi lebih mudah."</p>
                        <div class="testimonial-name">DEWI LESTARI</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Budi Santoso">
                        </div>
                        <p class="testimonial-text">"Forum komunitas di RabitFarm memungkinkan saya berbagi pengalaman dan belajar dari peternak lain. Laporan keuangan yang detail juga membantu saya mengatur bisnis dengan lebih baik."</p>
                        <div class="testimonial-name">BUDI SANTOSO</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content text-center">
                <h3>SUBSCRIBE TO OUR NEWSLETTER</h3>
                <p>Dapatkan tips dan informasi terbaru seputar peternakan kelinci langsung ke email Anda</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Enter your email address">
                    <button type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">↑</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>