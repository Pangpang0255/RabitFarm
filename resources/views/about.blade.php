<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        .hero-about {
            position: relative;
            height: 400px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920') center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-about h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .hero-about p {
            font-size: 18px;
            margin-bottom: 10px;
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
        
        .about-content {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .about-text h2 {
            color: #228B22;
            font-size: 36px;
            margin-bottom: 25px;
        }
        .about-text p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .about-text ul {
            list-style: none;
            padding: 0;
            margin: 30px 0;
        }
        .about-text ul li {
            color: #666;
            padding: 10px 0;
            position: relative;
            padding-left: 30px;
        }
        .about-text ul li:before {
            content: "✓";
            color: #228B22;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        .about-image {
            position: relative;
        }
        .about-image img {
            width: 100%;
            border-radius: 10px;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background-color: #228B22;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .play-button:hover {
            background-color: #1a6b1a;
            transform: translate(-50%, -50%) scale(1.1);
        }
        .play-button:before {
            content: "▶";
            color: white;
            font-size: 24px;
            margin-left: 5px;
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
                        <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard Monitoring</a></li>
                                    <li><a class="dropdown-item" href="/recording">Pencatatan Digital</a></li>
                                    <li><a class="dropdown-item" href="/database-ternak">Database Ternak</a></li>
                                    <li><a class="dropdown-item" href="/notifications">Notifikasi</a></li>
                                    <li><a class="dropdown-item" href="/forum">Forum Komunitas</a></li>
                                    <li><a class="dropdown-item" href="/reports">Laporan Keuangan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" style="margin-left: 15px;">
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                             <li class="nav-item">
                            <a class="btn btn-green" href="{{ route('login') }}" style="padding: 8px 20px; border-radius: 20px; margin-left: 15px;">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-about">
        <h1>About</h1>
        <p>Platform digital terpercaya untuk peternakan kelinci modern dan produktif</p>
        <div class="breadcrumb-custom">
            <a href="/">Home</a> <span>/</span> <span>About</span>
        </div>
    </div>

    <section class="about-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>Peternakan Kelinci Berkualitas</h2>
                        <p>RabitFarm adalah platform digital yang didedikasikan untuk membantu peternak kelinci dalam mengelola peternakan mereka dengan lebih efisien dan produktif. Kami memahami bahwa peternakan kelinci memerlukan perhatian khusus, mulai dari pemilihan bibit, pakan berkualitas, hingga pengelolaan kesehatan yang optimal.</p>
                        <p>Kelinci merupakan hewan ternak yang memiliki potensi besar dalam industri peternakan. Dengan masa reproduksi yang cepat dan daging yang bergizi tinggi, peternakan kelinci menjadi peluang bisnis yang menjanjikan. Melalui teknologi digital, kami membantu Anda memaksimalkan potensi peternakan kelinci Anda.</p>
                        <ul>
                            <li>Monitoring kesehatan kelinci secara real-time</li>
                            <li>Pencatatan pakan dan nutrisi yang tepat</li>
                            <li>Manajemen reproduksi dan breeding yang terorganisir</li>
                        </ul>
                        <a href="/dashboard" class="btn btn-green">GET IN TOUCH</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="{{ asset('images/rabbits/rabit4.jpg') }}" alt="Rabbit Farm">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">↑</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>