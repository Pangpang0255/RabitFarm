<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RabitFarm</title>
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
        .btn-green { background-color: #32CD32; border-color: #32CD32; color: white; }
        .btn-green:hover { background-color: #228B22; border-color: #228B22; }
        
        .hero-section {
            position: relative;
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1920&q=80') center/cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0;
        }
        .hero-content {
            z-index: 2;
            max-width: 700px;
        }
        .hero-tag {
            display: inline-block;
            background-color: white;
            color: #333;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
        }
        .hero-section h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.2;
        }
        .hero-section h1 .highlight {
            color: #ffc107;
        }
        .hero-section p {
            font-size: 16px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            line-height: 1.6;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-hero {
            background-color: #ffc107;
            color: #333;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            border: none;
        }
        .btn-hero:hover {
            background-color: #ffb300;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }
        
        /* Testimonial Styles */
        .testimonial-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            margin-top: 80px;
        }
        .testimonial-title {
            text-align: center;
            margin-bottom: 60px;
        }
        .testimonial-title h2 {
            font-size: 42px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .testimonial-title p {
            font-size: 18px;
            color: #7f8c8d;
        }
        .testimonial-title p span {
            color: #ffc107;
            font-weight: 600;
        }
        .testimonial-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: 100%;
            transition: all 0.3s;
        }
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .testimonial-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 3px solid #7cb342;
        }
        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .testimonial-name {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .testimonial-text {
            color: #7f8c8d;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .testimonial-stars {
            color: #ffc107;
            font-size: 16px;
        }
        .testimonial-nav {
            text-align: center;
            margin-top: 40px;
        }
        .testimonial-nav button {
            background: none;
            border: none;
            font-size: 40px;
            color: #2c3e50;
            cursor: pointer;
            margin: 0 10px;
            transition: all 0.3s;
        }
        .testimonial-nav button:hover {
            color: #7cb342;
            transform: scale(1.2);
        }
        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            position: relative;
            bottom: auto;
        }
        .testimonial-dots button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #bdc3c7;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            padding: 0;
        }
        .testimonial-dots button.active {
            background-color: #2c3e50;
            width: 30px;
            border-radius: 6px;
        }
        .testimonial-dots button:hover {
            background-color: #7cb342;
        }
        .carousel-indicators {
            position: relative;
            margin: 0;
        }
        
        /* Who We Are Section */
        .who-we-are-section {
            background-color: #2f5233;
            color: white;
            padding: 80px 0;
            margin-top: 80px;
        }
        .who-title {
            text-align: center;
            margin-bottom: 60px;
        }
        .who-title h2 {
            font-size: 48px;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
        }
        .who-title p {
            font-size: 20px;
            color: #e8e8e8;
        }
        .who-title p span {
            color: #ffc107;
            font-weight: 600;
        }
        .who-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        .who-image {
            position: relative;
            flex: 1;
        }
        .who-image img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .who-badge {
            position: absolute;
            right: -30px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ffc107;
            color: #2f5233;
            padding: 30px 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(255,193,7,0.4);
            font-weight: 700;
        }
        .who-badge .number {
            font-size: 42px;
            display: block;
            margin-bottom: 5px;
        }
        .who-badge .text {
            font-size: 14px;
            display: block;
        }
        .who-text {
            flex: 1;
        }
        .who-text p {
            font-size: 19px;
            line-height: 1.9;
            color: #e8e8e8;
            margin: 0;
            font-weight: 500;
        }
        
        /* Footer Styles */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 60px 0 30px;
            margin-top: 0;
        }
        .footer-section h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .footer-section p {
            color: #bdc3c7;
            line-height: 1.8;
            font-size: 14px;
        }
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        .footer-section ul li {
            margin-bottom: 12px;
        }
        .footer-section ul li a {
            color: #bdc3c7;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }
        .footer-section ul li a:hover {
            color: #7cb342;
            padding-left: 5px;
        }
        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        .footer-social a {
            width: 40px;
            height: 40px;
            background-color: #34495e;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s;
        }
        .footer-social a:hover {
            background-color: #7cb342;
            transform: translateY(-3px);
        }
        .footer-bottom {
            border-top: 1px solid #34495e;
            margin-top: 40px;
            padding-top: 25px;
            text-align: center;
        }
        .footer-bottom p {
            color: #95a5a6;
            font-size: 14px;
            margin: 0;
        }
        .footer-logo {
            color: #7cb342;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .carousel-indicators {
            bottom: 20px;
        }
        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
        }
        .feature-card {
            text-align: center;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 50px;
            color: #228B22;
            margin-bottom: 20px;
        }
        #heroCarousel {
            margin-top: -70px;
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

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="hero-section">
                <div class="hero-content">
                    <div class="hero-tag">WELCOME TO RabitFarm</div>
                    <h1><span class="highlight">Agriculture</span> from a<br>Fresh Perspective</h1>
                    <p>There are numerous variations of passages available, but most have been modified in some way by the addition of humor or randomised words.</p>
                    <a href="/dashboard" class="btn-hero">
                        Contact us
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920&q=80') center/cover;">
                <div class="hero-content">
                    <div class="hero-tag">WELCOME TO AGRICULTURE</div>
                    <h1><span class="highlight">Peternakan</span> Kelinci<br>Modern & Organik</h1>
                    <p>Kelinci sehat dengan pakan organik terbaik untuk hasil maksimal dan berkelanjutan</p>
                    <a href="/dashboard" class="btn-hero">
                        Mulai Sekarang
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920&q=80') center/cover;">
                <div class="hero-content">
                    <div class="hero-tag">JOIN OUR COMMUNITY</div>
                    <h1><span class="highlight">Bergabung</span> dengan<br>Komunitas Peternak</h1>
                    <p>Ribuan peternak telah mempercayai RabitFarm untuk meningkatkan bisnis mereka</p>
                    <a href="/forum" class="btn-hero">
                        Gabung Sekarang
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container" style="margin-top: 50px;">
    <div class="text-center mb-5">
        <h2 style="font-size: 36px; font-weight: 700; color: #2c3e50;">Fitur Unggulan Kami</h2>
        <p style="font-size: 16px; color: #7f8c8d;">Solusi lengkap untuk meningkatkan produktivitas peternakan kelinci Anda</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 13h2l2 3 4-6 4 6 2-3h2M3 3h18v18H3V3z" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="7 13 12 8 16 12 20 8" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Dashboard Monitoring</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Pantau semua aktivitas peternakan Anda dalam satu dashboard yang komprehensif dan mudah dipahami</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 12h6M9 16h6" stroke="#7cb342" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Pencatatan Digital</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Catat semua aktivitas harian dengan mudah dan terorganisir untuk hasil yang lebih baik</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Notifikasi Otomatis</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Dapatkan pengingat otomatis untuk kegiatan penting peternakan Anda</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Forum Komunitas</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Berbagi pengalaman dan berdiskusi dengan peternak kelinci lainnya di seluruh Indonesia</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v4m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Laporan Keuangan</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Kelola keuangan peternakan dengan laporan yang detail dan akurat</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card" style="background: white; border: 1px solid #e0e0e0; padding: 50px 30px;">
                <div class="feature-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" stroke="#7cb342" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 style="font-size: 20px; font-weight: 600; color: #2c3e50; margin-top: 20px;">Analisis Data</h4>
                <p style="color: #7f8c8d; font-size: 14px; line-height: 1.7;">Dapatkan insight berharga dari data peternakan Anda untuk keputusan yang lebih baik</p>
            </div>
        </div>
    </div>

    <div class="text-center my-5">
        <h3>Siap Meningkatkan Produktivitas Peternakan Anda?</h3>
        <p class="mb-4">Bergabunglah dengan ribuan peternak yang telah mempercayai RabitFarm</p>
        <a href="/dashboard" class="btn btn-green btn-lg">Mulai Gratis</a>
    </div>
</div>

<!-- Who We Are Section -->
<section class="who-we-are-section">
    <div class="container">
        <div class="who-title">
            <h2>Tentang Sistem Kami</h2>
            <p>Saat ini kami fokus pada pengembangan dan penyediaan <span>ekosistem digital</span> untuk peternakan kelinci modern</p>
        </div>
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="who-image">
                    <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=800&q=80" alt="Agriculture Farm">
                    <div class="who-badge">
                        <span class="number">5 +</span>
                        <span class="text">Fitur <br>Unggulan</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="who-text" style="padding-left: 50px;">
                    <p>Kami menyediakan ekosistem digital untuk mendukung pengelolaan kandang modern Anda. Mulai dari pemilihan bibit berkualitas, 
                        penjadwalan breeding program, hingga manajemen pakan dan pencatatan kesehatan kelinci yang terstruktur. Semua data operasional 
                        tersaji dalam dashboard monitoring yang intuitif, dilengkapi akses pemasaran produk untuk memastikan keberlanjutan dan keuntungan bisnis 
                        peternakan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="container">
        <div class="testimonial-title">
            <h2>Testimonial</h2>
            <p>What our <span>Customers</span> Say</p>
        </div>
        
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=47" alt="Siti Aminah">
                                </div>
                                <div class="testimonial-name">Siti Aminah</div>
                                <div class="testimonial-text">
                                    RabitFarm telah mengubah cara saya mengelola peternakan. Sistem monitoring yang canggih membuat segalanya lebih mudah dan efisien.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=12" alt="Budi Santoso">
                                </div>
                                <div class="testimonial-name">Budi Santoso</div>
                                <div class="testimonial-text">
                                    Kualitas kelinci yang saya hasilkan meningkat drastis. Pencatatan digital sangat membantu dalam tracking kesehatan ternak.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=45" alt="Dewi Lestari">
                                </div>
                                <div class="testimonial-name">Dewi Lestari</div>
                                <div class="testimonial-text">
                                    Berkat RabitFarm, saya bisa memantau peternakan dari mana saja. Notifikasi otomatis sangat membantu mengingatkan jadwal penting.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=13" alt="Ahmad Fauzi">
                                </div>
                                <div class="testimonial-name">Ahmad Fauzi</div>
                                <div class="testimonial-text">
                                    Tim support sangat responsif dan membantu. RabitFarm benar-benar solusi terbaik untuk peternak kelinci modern.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=48" alt="Rina Wati">
                                </div>
                                <div class="testimonial-name">Rina Wati</div>
                                <div class="testimonial-text">
                                    Laporan keuangan yang detail membantu saya menganalisis profit dengan tepat. Sangat recommended untuk peternak profesional!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=14" alt="Hendra Wijaya">
                                </div>
                                <div class="testimonial-name">Hendra Wijaya</div>
                                <div class="testimonial-text">
                                    Forum komunitas sangat aktif dan informatif. Saya belajar banyak tips dari peternak lain yang lebih berpengalaman.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=49" alt="Diana Putri">
                                </div>
                                <div class="testimonial-name">Diana Putri</div>
                                <div class="testimonial-text">
                                    Dashboard yang user-friendly membuat saya tidak kesulitan meskipun baru pertama kali menggunakan sistem digital untuk ternak.
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=15" alt="Rizki Pratama">
                                </div>
                                <div class="testimonial-name">Rizki Pratama</div>
                                <div class="testimonial-text">
                                    Produktivitas peternakan saya meningkat 40% sejak menggunakan RabitFarm. Investasi yang sangat worth it!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=44" alt="Linda Sari">
                                </div>
                                <div class="testimonial-name">Linda Sari</div>
                                <div class="testimonial-text">
                                    Fitur analisis data sangat membantu dalam membuat keputusan bisnis. Data-driven farming is the future!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=33" alt="Agus Setiawan">
                                </div>
                                <div class="testimonial-name">Agus Setiawan</div>
                                <div class="testimonial-text">
                                    Sejak pakai RabitFarm, tidak ada lagi kelinci yang terlewat jadwal vaksinasi. Notifikasi otomatis bekerja sempurna!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=41" alt="Maya Indah">
                                </div>
                                <div class="testimonial-name">Maya Indah</div>
                                <div class="testimonial-text">
                                    Platform yang sangat membantu untuk pemula seperti saya. Tutorial lengkap dan mudah diikuti. Terima kasih RabitFarm!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="testimonial-card">
                                <div class="testimonial-avatar">
                                    <img src="https://i.pravatar.cc/200?img=51" alt="Eko Prasetyo">
                                </div>
                                <div class="testimonial-name">Eko Prasetyo</div>
                                <div class="testimonial-text">
                                    Manajemen kandang jadi lebih terstruktur. Saya bisa track semua kelinci dengan mudah dan cepat. Luar biasa!
                                </div>
                                <div class="testimonial-stars">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-nav">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" aria-label="Previous">«</button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" aria-label="Next">»</button>
            </div>
            
            <div class="carousel-indicators testimonial-dots">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-section">
                <div class="footer-logo">🐰 RABIT FARM</div>
                <p>Platform digital terpercaya untuk manajemen peternakan kelinci modern. Membantu ribuan peternak meningkatkan produktivitas dan keuntungan.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Twitter">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="YouTube">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="col-md-2 footer-section">
                <h5>Perusahaan</h5>
                <ul>
                    <li><a href="/about">Tentang Kami</a></li>
                    <li><a href="/services">Layanan</a></li>
                    <li><a href="/forum">Blog</a></li>
                    <li><a href="/reports">Kontak</a></li>
                </ul>
            </div>
            
            <div class="col-md-2 footer-section">
                <h5>Fitur</h5>
                <ul>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/recording">Pencatatan</a></li>
                    <li><a href="/notifications">Notifikasi</a></li>
                    <li><a href="/reports">Laporan</a></li>
                </ul>
            </div>
            
            <div class="col-md-2 footer-section">
                <h5>Bantuan</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Panduan</a></li>
                    <li><a href="#">Dukungan</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            
            <div class="col-md-2 footer-section">
                <h5>Hubungi Kami</h5>
                <ul>
                    <li>📧 info@rabitfarm.com</li>
                    <li>📞 (021) 123-4567</li>
                    <li>📍 Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 RabitFarm. All rights reserved. | Dibuat dengan ❤️ untuk peternak Indonesia</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>