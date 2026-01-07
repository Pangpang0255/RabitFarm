<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - RabitFarm</title>
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
        .btn-green {
            background-color: #32CD32;
            border-color: #32CD32;
            color: white;
        }
        .btn-green:hover {
            background-color: #228B22;
            border-color: #228B22;
        }
        
        .hero-contact {
            position: relative;
            height: 300px;
            background: linear-gradient(rgba(34,139,34,0.8), rgba(34,139,34,0.8)), url('https://images.unsplash.com/photo-1560493676-04071c5f467b?w=1920') center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-contact h1 {
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
        
        .contact-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .section-header h3 {
            color: #228B22;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .section-header h2 {
            color: #333;
            font-size: 36px;
            font-weight: bold;
        }
        .section-header p {
            color: #666;
            font-size: 16px;
            max-width: 600px;
            margin: 15px auto 0;
        }
        
        .contact-info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .info-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.12);
        }
        
        .info-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #228B22, #32CD32);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            color: white;
        }
        
        .info-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
        }
        
        .info-text {
            color: #666;
            font-size: 15px;
            line-height: 1.8;
        }
        
        .info-text a {
            color: #228B22;
            text-decoration: none;
        }
        
        .info-text a:hover {
            text-decoration: underline;
        }
        
        .contact-form-container {
            background: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: block;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #228B22;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #228B22, #32CD32);
            color: white;
            border: none;
            padding: 15px 50px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(34,139,34,0.3);
        }
        
        .map-section {
            padding: 80px 0;
            background: white;
        }
        
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            height: 450px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .social-media {
            text-align: center;
            padding: 60px 0;
            background: #f8f9fa;
        }
        
        .social-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .social-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #228B22;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            color: white;
        }
        
        .social-icon.facebook:hover {
            background: #3b5998;
        }
        
        .social-icon.twitter:hover {
            background: #1da1f2;
        }
        
        .social-icon.instagram:hover {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        }
        
        .social-icon.whatsapp:hover {
            background: #25d366;
        }
        
        .social-icon.youtube:hover {
            background: #ff0000;
        }
        
        footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer-content {
            text-align: center;
        }
        
        .footer-content p {
            margin: 0;
            color: #bdc3c7;
        }
        
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #228B22;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            z-index: 1000;
            transition: all 0.3s;
        }
        .scroll-top:hover {
            background-color: #1a6b1a;
            transform: translateY(-5px);
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

    <div class="hero-contact">
        <h1>Hubungi Kami</h1>
        <div class="breadcrumb-custom">
            <a href="/">Home</a> <span>/</span> <span>Kontak</span>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="section-header">
                <h3>HUBUNGI KAMI</h3>
                <h2>Kami Siap Membantu Anda</h2>
                <p>Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau membutuhkan bantuan terkait peternakan kelinci</p>
            </div>

            <div class="contact-info-cards">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="info-title">Alamat Kami</h3>
                    <p class="info-text">
                        Jl. Jatisari No. 88<br>
                        Semarang, Jawa Tengah 50275<br>
                        Indonesia
                    </p>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="info-title">Telepon</h3>
                    <p class="info-text">
                        <strong>Kantor:</strong> <a href="tel:+622212345678">(022) 1234-5678</a><br>
                        <strong>Mobile:</strong> <a href="tel:+628123456789">+62 812-3456-789</a><br>
                        <strong>WhatsApp:</strong> <a href="https://wa.me/628123456789">+62 812-3456-789</a>
                    </p>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="info-title">Email</h3>
                    <p class="info-text">
                        <strong>Umum:</strong> <a href="mailto:info@rabitfarm.com">info@rabitfarm.com</a><br>
                        <strong>Support:</strong> <a href="mailto:support@rabitfarm.com">support@rabitfarm.com</a><br>
                        <strong>Marketing:</strong> <a href="mailto:marketing@rabitfarm.com">marketing@rabitfarm.com</a>
                    </p>
                </div>
            </div>

            <div class="contact-form-container">
                <h3 class="section-title text-center mb-4" style="color: #228B22; font-weight: 700;">Kirim Pesan</h3>
                <form id="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" class="form-control" name="name" required placeholder="Masukkan nama lengkap">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" required placeholder="nama@email.com">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No. Telepon *</label>
                                <input type="tel" class="form-control" name="phone" required placeholder="+62 812-3456-789">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Subjek</label>
                                <input type="text" class="form-control" name="subject" placeholder="Topik pesan">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Pesan *</label>
                        <textarea class="form-control" name="message" required placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <div class="section-header">
                <h3>LOKASI KAMI</h3>
                <h2>Temukan Kami di Peta</h2>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.202597229776!2d110.30536547121744!3d-7.072234442792685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7062225104fdc3%3A0x960172f040610cc!2sJatisari%2C%20Kec.%20Mijen%2C%20Kota%20Semarang%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1766525752280!5m2!1sid!2sid" 
                    width="600"
                     height="450"
                      style="border:0;"
                       allowfullscreen=""
                        loading="lazy"
                         referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
            </div>
        </div>
    </section>

    <section class="social-media">
        <div class="container">
            <h2 class="social-title">Ikuti Kami di Media Sosial</h2>
            <div class="social-icons">
                <a href="https://facebook.com" class="social-icon facebook" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com" class="social-icon instagram" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://wa.me/628123456789" class="social-icon whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://youtube.com" class="social-icon youtube" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2024 RabitFarm. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <div class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Show success message
            alert('Terima kasih! Pesan Anda telah terkirim.\n\nNama: ' + data.name + '\nEmail: ' + data.email + '\n\nKami akan segera menghubungi Anda.');
            
            // Reset form
            this.reset();
            
            // Here you can add AJAX call to send data to backend
            // fetch('/api/contact', {
            //     method: 'POST',
            //     headers: {'Content-Type': 'application/json'},
            //     body: JSON.stringify(data)
            // });
        });

        // Show/hide scroll to top button
        window.addEventListener('scroll', function() {
            const scrollTop = document.querySelector('.scroll-top');
            if (window.pageYOffset > 300) {
                scrollTop.style.display = 'flex';
            } else {
                scrollTop.style.display = 'none';
            }
        });
    </script>
</body>
</html>
