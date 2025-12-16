<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: white; }
        header { background-color: white; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .navbar-brand { color: #228B22 !important; font-weight: bold; font-size: 24px; }
        .nav-link { color: #333 !important; margin: 0 15px; }
        .nav-link:hover { color: #228B22 !important; }
        .dropdown-menu { border: 1px solid #ddd; }
        .btn-green { background-color: #32CD32; border-color: #32CD32; color: white; }
        .btn-green:hover { background-color: #228B22; border-color: #228B22; }
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
                        <li class="nav-item"><a class="nav-link" href="/notifications">Testimoni</a></li>
                        <li class="nav-item"><a class="nav-link" href="/forum">Forum Komunitas</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="/reports">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>