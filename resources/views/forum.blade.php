@extends('layouts.app')

@section('content')
<style>
    .social-community-section {
        padding: 40px 0 60px;
    }
    .social-community-title {
        text-align: center;
        margin-bottom: 50px;
    }
    .social-community-title h2 {
        font-size: 42px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    .social-community-title p {
        font-size: 18px;
        color: #7f8c8d;
    }
    .social-card {
        background: white;
        border-radius: 15px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.3s;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        height: 100%;
        text-decoration: none;
        display: block;
        border: 2px solid #e8e8e8;
    }
    .social-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .social-card.facebook:hover {
        border-color: #1877F2;
        background: linear-gradient(135deg, #1877F2 0%, #0C63D4 100%);
    }
    .social-card.facebook:hover * {
        color: white !important;
    }
    .social-card.shopee:hover {
        border-color: #EE4D2D;
        background: linear-gradient(135deg, #EE4D2D 0%, #FF6443 100%);
    }
    .social-card.shopee:hover * {
        color: white !important;
    }
    .social-card.instagram:hover {
        background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #F56040 100%);
        border-color: #E1306C;
    }
    .social-card.instagram:hover * {
        color: white !important;
    }
    .social-card.tiktok:hover {
        background: linear-gradient(135deg, #000000 0%, #00f2ea 100%);
        border-color: #00f2ea;
    }
    .social-card.tiktok:hover * {
        color: white !important;
    }
    .social-icon {
        font-size: 70px;
        margin-bottom: 25px;
        transition: all 0.3s;
    }
    .social-card.facebook .social-icon {
        color: #1877F2;
    }
    .social-card.shopee .social-icon {
        color: #EE4D2D;
    }
    .social-card.instagram .social-icon {
        color: #E1306C;
    }
    .social-card.tiktok .social-icon {
        color: #000000;
    }
    .social-card h4 {
        font-size: 24px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        transition: all 0.3s;
    }
    .social-card p {
        color: #7f8c8d;
        font-size: 15px;
        margin-bottom: 20px;
        transition: all 0.3s;
    }
    .social-followers {
        font-size: 14px;
        color: #95a5a6;
        font-weight: 500;
        transition: all 0.3s;
    }
</style>

<div class="social-community-section">
    <div class="container">
        <div class="social-community-title">
            <h2>Bergabung dengan Komunitas Kami</h2>
            <p>Ikuti kami di berbagai platform sosial media untuk tips, update, dan diskusi seputar peternakan kelinci</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <a href="https://www.facebook.com/groups/464716873628732" target="_blank" class="social-card facebook">
                    <div class="social-icon">
                        <svg width="70" height="70" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </div>
                    <h4>Facebook</h4>
                    <p>Bergabung dengan grup peternak kelinci dan dapatkan tips harian</p>
                    <div class="social-followers">30K+ Followers</div>
                </a>
            </div>
            
            <div class="col-md-3">
                <a href="https://shopee.co.id/(Kelinci-Lokal)-Anakan-Kelinci-Sehat-Lincah-Usia-2-Bulan-i.126906337.5140428059?extraParams=%7B%22display_model_id%22%3A70155745000%2C%22model_selection_logic%22%3A3%7D&sp_atk=cb16d4a7-91c3-4a62-b8ba-e270db8ec6db&xptdk=cb16d4a7-91c3-4a62-b8ba-e270db8ec6db" target="_blank" class="social-card shopee">
                    <div class="social-icon">
                        <svg width="70" height="70" viewBox="0 0 362 535.3" fill="currentColor">
                            <path d="M36.5,118.1h75.3c2.3-25.5,9.4-48.4,19.6-66.1c13.5-23.4,32.7-37.8,54.4-37.8c21.7,0,40.8,14.5,54.4,37.8
                                c10.2,17.6,17.3,40.6,19.6,66.1H335c8.9,0,16.9,7.3,16.2,16.2L336.1,345c-1.9,26.4-18.5,41.5-42.6,41.5H78.1
                                c-26.8,0-41-18.7-42.6-41.5L20.3,134.4C19.7,125.5,27.6,118.1,36.5,118.1L36.5,118.1z M130.6,118.1h110.2
                                c-2.2-22.1-8.3-41.7-17-56.7C213.8,43.9,200.2,33,185.8,33c-14.5,0-28,10.9-38.2,28.5C138.9,76.4,132.9,96.1,130.6,118.1z"/>
                        </svg>
                    </div>
                    <h4>Shopee</h4>
                    <p>Belanja produk kelinci dan perlengkapan kandang di toko kami</p>
                    <div class="social-followers">500+ Produk</div>
                </a>
            </div>
            
            <div class="col-md-3">
                <a href="https://www.instagram.com/farmrabbits.semarang/" target="_blank" class="social-card instagram">
                    <div class="social-icon">
                        <svg width="70" height="70" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </div>
                    <h4>Instagram</h4>
                    <p>Lihat foto dan video kelinci lucu dari peternak lain</p>
                    <div class="social-followers">1K+ Followers</div>
                </a>
            </div>
            
            <div class="col-md-3">
                <a href="https://vt.tiktok.com/ZSPaGDG3F/" target="_blank" class="social-card tiktok">
                    <div class="social-icon">
                        <svg width="70" height="70" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                        </svg>
                    </div>
                    <h4>TikTok</h4>
                    <p>Tutorial singkat dan konten menarik seputar perawatan kelinci</p>
                    <div class="social-followers">5K+ Followers</div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h2 class="mb-4">Forum Komunitas</h2>
        <p>Diskusi dengan peternak lain.</p>
        <div>
            <h3>Postingan Terbaru</h3>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tips Merawat Kelinci</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Oleh: User1</h6>
                    <p class="card-text">Pastikan kandang bersih...</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pakan Terbaik</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Oleh: User2</h6>
                    <p class="card-text">Gunakan pakan organik...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection