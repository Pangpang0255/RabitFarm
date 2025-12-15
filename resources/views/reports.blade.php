<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RabitFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: #f8f9fa; 
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
        
        .contact-section {
            padding: 80px 0;
        }
        .contact-header {
            text-align: center;
            margin-bottom: 60px;
        }
        .contact-header h1 {
            color: #333;
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .contact-header p {
            color: #666;
            font-size: 16px;
        }
        
        .contact-form-section h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 15px;
        }
        .contact-form-section p {
            color: #666;
            margin-bottom: 30px;
        }
        .form-label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .form-control, .form-control:focus {
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding: 10px 0;
            box-shadow: none;
        }
        .form-control:focus {
            border-bottom-color: #32CD32;
        }
        textarea.form-control {
            min-height: 120px;
        }
        .btn-send {
            background-color: transparent;
            border: 2px solid #32CD32;
            color: #32CD32;
            padding: 12px 40px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s;
        }
        .btn-send:hover {
            background-color: #32CD32;
            color: white;
        }
        
        .contact-info h3 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
        }
        .contact-info > p {
            color: #666;
            margin-bottom: 40px;
        }
        .info-item {
            margin-bottom: 30px;
        }
        .info-item-header {
            color: #32CD32;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .info-item-content {
            color: #666;
            line-height: 1.6;
        }
        .info-icon {
            color: #32CD32;
            font-size: 24px;
            margin-right: 15px;
            width: 30px;
        }
        
        .social-section {
            margin-top: 40px;
        }
        .social-section h4 {
            color: #32CD32;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: white;
            border: 1px solid #e0e0e0;
            color: #666;
            margin-right: 10px;
            transition: all 0.3s;
        }
        .social-icons a:hover {
            background-color: #32CD32;
            color: white;
            border-color: #32CD32;
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

    <section class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h1>Contact</h1>
                <p>Need Help? Contact Us</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form-section">
                        <h2>Let's Start a Conversation</h2>
                        <p>Kami siap membantu Anda mengembangkan peternakan kelinci. Hubungi kami untuk konsultasi gratis.</p>
                        
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">NAME</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">PHONE</label>
                                    <input type="tel" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">SUBJECT</label>
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">MESSAGE</label>
                                <textarea class="form-control" placeholder="Tell us about your project"></textarea>
                            </div>
                            <button type="submit" class="btn btn-send">SEND MESSAGE →</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p>Hubungi kami untuk informasi lebih lanjut tentang layanan peternakan kelinci</p>
                        
                        <div class="info-item d-flex">
                            <i class="fas fa-map-marker-alt info-icon"></i>
                            <div>
                                <div class="info-item-header">ADDRESS</div>
                                <div class="info-item-content">
                                    Jl. Peternakan Kelinci No. 123<br>
                                    Jakarta, Indonesia 12345
                                </div>
                            </div>
                        </div>

                        <div class="info-item d-flex">
                            <i class="fas fa-envelope info-icon"></i>
                            <div>
                                <div class="info-item-header">EMAIL</div>
                                <div class="info-item-content">
                                    info@rabitfarm.com
                                </div>
                            </div>
                        </div>

                        <div class="info-item d-flex">
                            <i class="fas fa-phone info-icon"></i>
                            <div>
                                <div class="info-item-header">PHONE</div>
                                <div class="info-item-content">
                                    +62 812-3456-7890
                                </div>
                            </div>
                        </div>

                        <div class="info-item d-flex">
                            <i class="fas fa-clock info-icon"></i>
                            <div>
                                <div class="info-item-header">HOURS</div>
                                <div class="info-item-content">
                                    Senin - Jumat: 9AM - 6PM<br>
                                    Sabtu: 10AM - 4PM
                                </div>
                            </div>
                        </div>

                        <div class="social-section">
                            <h4>CONNECT WITH US</h4>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>