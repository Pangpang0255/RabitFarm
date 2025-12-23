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
    
    /* Forum Styles */
    .forum-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    .forum-header {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }
    .forum-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    .forum-subtitle {
        color: #7f8c8d;
        font-size: 16px;
    }
    .btn-new-post {
        background: linear-gradient(135deg, #228B22, #32CD32);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn-new-post:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(34,139,34,0.3);
    }
    .post-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    .post-card:hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 15px;
    }
    .post-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .author-avatar {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #228B22, #32CD32);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 18px;
    }
    .author-info h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
    }
    .author-info span {
        font-size: 13px;
        color: #95a5a6;
    }
    .post-actions {
        display: flex;
        gap: 8px;
    }
    .btn-action {
        background: transparent;
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-edit {
        color: #3498db;
    }
    .btn-edit:hover {
        background: #e3f2fd;
    }
    .btn-delete {
        color: #e74c3c;
    }
    .btn-delete:hover {
        background: #fadbd8;
    }
    .post-title {
        font-size: 20px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 12px;
    }
    .post-content {
        color: #555;
        line-height: 1.7;
        margin-bottom: 15px;
    }
    .post-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid #ecf0f1;
    }
    .post-stats {
        display: flex;
        gap: 20px;
        font-size: 14px;
        color: #7f8c8d;
    }
    .btn-reply {
        background: transparent;
        border: 1px solid #228B22;
        color: #228B22;
        padding: 8px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s;
    }
    .btn-reply:hover {
        background: #228B22;
        color: white;
    }
    .replies-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #ecf0f1;
    }
    .reply-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 12px;
        border-left: 3px solid #228B22;
    }
    .reply-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .reply-author {
        font-weight: 600;
        color: #2c3e50;
        font-size: 14px;
    }
    .reply-time {
        font-size: 12px;
        color: #95a5a6;
    }
    .reply-content {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
    }
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }
    .modal.active {
        display: flex;
    }
    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 12px;
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .modal-title {
        font-size: 22px;
        font-weight: 700;
        color: #2c3e50;
    }
    .btn-close {
        background: transparent;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #7f8c8d;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 14px;
    }
    .form-control {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        outline: none;
        border-color: #228B22;
    }
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    .btn-submit {
        background: linear-gradient(135deg, #228B22, #32CD32);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        transition: all 0.3s;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(34,139,34,0.3);
    }
    .btn-cancel {
        background: #95a5a6;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }
    .post-interactions {
        display: flex;
        gap: 20px;
        align-items: center;
        padding-top: 15px;
    }
    .interaction-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        color: #555;
        transition: all 0.3s;
    }
    .interaction-btn:hover {
        background: #f0f0f0;
    }
    .interaction-btn i {
        font-size: 18px;
    }
    .interaction-btn.liked {
        color: #228B22;
    }
    .interaction-btn.liked i {
        color: #228B22;
    }
    .interaction-btn.disliked {
        color: #e74c3c;
    }
    .show-replies-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        color: #1976d2;
        font-weight: 600;
        font-size: 14px;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 20px;
        transition: all 0.3s;
    }
    .show-replies-btn:hover {
        background: #e3f2fd;
    }
    .show-replies-btn i {
        font-size: 16px;
        transition: transform 0.3s;
    }
    .show-replies-btn.active i {
        transform: rotate(180deg);
    }
    .reply-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .reply-like-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 15px;
        font-size: 12px;
        color: #555;
        transition: all 0.3s;
    }
    .reply-like-btn:hover {
        background: #f0f0f0;
    }
    .reply-like-btn.liked {
        color: #228B22;
    }
    .reply-like-btn i {
        font-size: 14px;
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

<!-- Forum Community Section -->
<div class="forum-section">
    <div class="container">
        <div class="forum-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="forum-title">Forum Komunitas</h2>
                    <p class="forum-subtitle">Diskusi dengan peternak lain dan berbagi pengalaman</p>
                </div>
                <button class="btn-new-post" onclick="openNewPostModal()">
                    <i class="fas fa-plus"></i> Buat Postingan Baru
                </button>
            </div>
        </div>

        <div id="postsContainer">
            <!-- Post 1 -->
            <div class="post-card" data-post-id="1">
                <div class="post-header">
                    <div class="post-author">
                        <div class="author-avatar">U1</div>
                        <div class="author-info">
                            <h5>User1</h5>
                            <span>2 jam yang lalu</span>
                        </div>
                    </div>
                    <div class="post-actions">
                        <button class="btn-action btn-edit" onclick="editPost(1)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deletePost(1)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
                <h3 class="post-title">Tips Merawat Kelinci di Musim Hujan</h3>
                <p class="post-content">Pastikan kandang selalu bersih dan kering. Gunakan alas yang dapat menyerap air dengan baik. Jangan lupa untuk memberikan vitamin tambahan agar kelinci tetap sehat dan tidak mudah sakit saat musim hujan.</p>
                
                <div class="post-interactions">
                    <button class="interaction-btn like-btn" onclick="likePost(1, this)">
                        <i class="far fa-thumbs-up"></i>
                        <span class="like-count">181</span>
                    </button>
                    <button class="interaction-btn dislike-btn" onclick="dislikePost(1, this)">
                        <i class="far fa-thumbs-down"></i>
                    </button>
                    <button class="interaction-btn" onclick="openReplyForm(1)">
                        <i class="far fa-comment"></i>
                        <span>Balas</span>
                    </button>
                    <button class="show-replies-btn" onclick="toggleReplies(1)">
                        <i class="fas fa-chevron-down"></i>
                        <span class="reply-count">3 balasan</span>
                    </button>
                </div>
                
                <div class="replies-section" id="replies-1" style="display: none;">
                    <div class="reply-card">
                        <div class="reply-header">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">U3</div>
                                <div>
                                    <span class="reply-author">User3</span>
                                    <span class="reply-time"> · 1 jam yang lalu</span>
                                </div>
                            </div>
                            <div class="reply-actions">
                                <button class="reply-like-btn" onclick="likeReply(this)">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>24</span>
                                </button>
                            </div>
                        </div>
                        <p class="reply-content">Terima kasih tipsnya! Sangat membantu sekali.</p>
                    </div>
                    <div class="reply-card">
                        <div class="reply-header">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">U4</div>
                                <div>
                                    <span class="reply-author">User4</span>
                                    <span class="reply-time"> · 30 menit yang lalu</span>
                                </div>
                            </div>
                            <div class="reply-actions">
                                <button class="reply-like-btn" onclick="likeReply(this)">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>12</span>
                                </button>
                            </div>
                        </div>
                        <p class="reply-content">Saya biasanya tambahkan jerami kering agar lebih hangat.</p>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                        <textarea class="form-control" placeholder="Tulis balasan Anda..." id="reply-input-1"></textarea>
                        <button class="btn-submit" style="margin-top: 10px;" onclick="addReply(1)">Kirim Balasan</button>
                    </div>
                </div>
            </div>

            <!-- Post 2 -->
            <div class="post-card" data-post-id="2">
                <div class="post-header">
                    <div class="post-author">
                        <div class="author-avatar">U2</div>
                        <div class="author-info">
                            <h5>User2</h5>
                            <span>5 jam yang lalu</span>
                        </div>
                    </div>
                    <div class="post-actions">
                        <button class="btn-action btn-edit" onclick="editPost(2)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deletePost(2)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
                <h3 class="post-title">Rekomendasi Pakan Organik untuk Kelinci</h3>
                <p class="post-content">Saya sudah mencoba berbagai jenis pakan organik untuk kelinci. Yang terbaik menurut saya adalah campuran rumput timothy, wortel, dan sayuran hijau. Kelinci saya jadi lebih sehat dan bulunya lebih mengkilap!</p>
                
                <div class="post-interactions">
                    <button class="interaction-btn like-btn" onclick="likePost(2, this)">
                        <i class="far fa-thumbs-up"></i>
                        <span class="like-count">245</span>
                    </button>
                    <button class="interaction-btn dislike-btn" onclick="dislikePost(2, this)">
                        <i class="far fa-thumbs-down"></i>
                    </button>
                    <button class="interaction-btn" onclick="openReplyForm(2)">
                        <i class="far fa-comment"></i>
                        <span>Balas</span>
                    </button>
                    <button class="show-replies-btn" onclick="toggleReplies(2)">
                        <i class="fas fa-chevron-down"></i>
                        <span class="reply-count">5 balasan</span>
                    </button>
                </div>
                
                <div class="replies-section" id="replies-2" style="display: none;">
                    <div class="reply-card">
                        <div class="reply-header">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">U5</div>
                                <div>
                                    <span class="reply-author">User5</span>
                                    <span class="reply-time"> · 3 jam yang lalu</span>
                                </div>
                            </div>
                            <div class="reply-actions">
                                <button class="reply-like-btn" onclick="likeReply(this)">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>15</span>
                                </button>
                            </div>
                        </div>
                        <p class="reply-content">Dimana bisa beli rumput timothy nya?</p>
                    </div>
                    <div class="reply-card">
                        <div class="reply-header">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">U2</div>
                                <div>
                                    <span class="reply-author">User2</span>
                                    <span class="reply-time"> · 2 jam yang lalu</span>
                                </div>
                            </div>
                            <div class="reply-actions">
                                <button class="reply-like-btn" onclick="likeReply(this)">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>8</span>
                                </button>
                            </div>
                        </div>
                        <p class="reply-content">@User5 Bisa beli di toko online atau marketplace. Banyak kok yang jual.</p>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                        <textarea class="form-control" placeholder="Tulis balasan Anda..." id="reply-input-2"></textarea>
                        <button class="btn-submit" style="margin-top: 10px;" onclick="addReply(2)">Kirim Balasan</button>
                    </div>
                </div>
            </div>

            <!-- Post 3 -->
            <div class="post-card" data-post-id="3">
                <div class="post-header">
                    <div class="post-author">
                        <div class="author-avatar">U6</div>
                        <div class="author-info">
                            <h5>User6</h5>
                            <span>1 hari yang lalu</span>
                        </div>
                    </div>
                    <div class="post-actions">
                        <button class="btn-action btn-edit" onclick="editPost(3)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn-action btn-delete" onclick="deletePost(3)">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
                <h3 class="post-title">Cara Breeding Kelinci untuk Pemula</h3>
                <p class="post-content">Bagi yang baru mau mulai breeding kelinci, pastikan kelinci sudah cukup umur (minimal 6 bulan). Pilih indukan yang sehat dan tidak ada cacat genetik. Siapkan kandang khusus untuk breeding yang aman dan nyaman.</p>
                
                <div class="post-interactions">
                    <button class="interaction-btn like-btn" onclick="likePost(3, this)">
                        <i class="far fa-thumbs-up"></i>
                        <span class="like-count">320</span>
                    </button>
                    <button class="interaction-btn dislike-btn" onclick="dislikePost(3, this)">
                        <i class="far fa-thumbs-down"></i>
                    </button>
                    <button class="interaction-btn" onclick="openReplyForm(3)">
                        <i class="far fa-comment"></i>
                        <span>Balas</span>
                    </button>
                    <button class="show-replies-btn" onclick="toggleReplies(3)">
                        <i class="fas fa-chevron-down"></i>
                        <span class="reply-count">8 balasan</span>
                    </button>
                </div>
                
                <div class="replies-section" id="replies-3" style="display: none;">
                    <div class="reply-card">
                        <div class="reply-header">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">U7</div>
                                <div>
                                    <span class="reply-author">User7</span>
                                    <span class="reply-time"> · 18 jam yang lalu</span>
                                </div>
                            </div>
                            <div class="reply-actions">
                                <button class="reply-like-btn" onclick="likeReply(this)">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>45</span>
                                </button>
                            </div>
                        </div>
                        <p class="reply-content">Sangat informatif! Saya baru mau mulai breeding nih.</p>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                        <textarea class="form-control" placeholder="Tulis balasan Anda..." id="reply-input-3"></textarea>
                        <button class="btn-submit" style="margin-top: 10px;" onclick="addReply(3)">Kirim Balasan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for New Post -->
<div class="modal" id="newPostModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Buat Postingan Baru</h3>
            <button class="btn-close" onclick="closeNewPostModal()">&times;</button>
        </div>
        <form id="newPostForm">
            <div class="form-group">
                <label class="form-label">Judul Postingan</label>
                <input type="text" class="form-control" id="postTitle" placeholder="Masukkan judul postingan..." required>
            </div>
            <div class="form-group">
                <label class="form-label">Isi Postingan</label>
                <textarea class="form-control" id="postContent" placeholder="Tulis isi postingan Anda..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Posting</button>
            <button type="button" class="btn-cancel" onclick="closeNewPostModal()">Batal</button>
        </form>
    </div>
</div>

<!-- Modal for Edit Post -->
<div class="modal" id="editPostModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Postingan</h3>
            <button class="btn-close" onclick="closeEditPostModal()">&times;</button>
        </div>
        <form id="editPostForm">
            <input type="hidden" id="editPostId">
            <div class="form-group">
                <label class="form-label">Judul Postingan</label>
                <input type="text" class="form-control" id="editPostTitle" required>
            </div>
            <div class="form-group">
                <label class="form-label">Isi Postingan</label>
                <textarea class="form-control" id="editPostContent" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <button type="button" class="btn-cancel" onclick="closeEditPostModal()">Batal</button>
        </form>
    </div>
</div>

<script>
    // Like Post
    function likePost(postId, button) {
        const likeBtn = button;
        const likeCountSpan = likeBtn.querySelector('.like-count');
        const dislikeBtn = likeBtn.parentElement.querySelector('.dislike-btn');
        let count = parseInt(likeCountSpan.textContent);
        
        if (likeBtn.classList.contains('liked')) {
            // Unlike
            likeBtn.classList.remove('liked');
            likeBtn.querySelector('i').className = 'far fa-thumbs-up';
            likeCountSpan.textContent = count - 1;
        } else {
            // Like
            likeBtn.classList.add('liked');
            likeBtn.querySelector('i').className = 'fas fa-thumbs-up';
            likeCountSpan.textContent = count + 1;
            
            // Remove dislike if active
            if (dislikeBtn.classList.contains('disliked')) {
                dislikeBtn.classList.remove('disliked');
                dislikeBtn.querySelector('i').className = 'far fa-thumbs-down';
            }
        }
    }

    // Dislike Post
    function dislikePost(postId, button) {
        const dislikeBtn = button;
        const likeBtn = dislikeBtn.parentElement.querySelector('.like-btn');
        const likeCountSpan = likeBtn.querySelector('.like-count');
        let count = parseInt(likeCountSpan.textContent);
        
        if (dislikeBtn.classList.contains('disliked')) {
            // Remove dislike
            dislikeBtn.classList.remove('disliked');
            dislikeBtn.querySelector('i').className = 'far fa-thumbs-down';
        } else {
            // Dislike
            dislikeBtn.classList.add('disliked');
            dislikeBtn.querySelector('i').className = 'fas fa-thumbs-down';
            
            // Remove like if active
            if (likeBtn.classList.contains('liked')) {
                likeBtn.classList.remove('liked');
                likeBtn.querySelector('i').className = 'far fa-thumbs-up';
                likeCountSpan.textContent = count - 1;
            }
        }
    }

    // Like Reply
    function likeReply(button) {
        const span = button.querySelector('span');
        let count = parseInt(span.textContent);
        
        if (button.classList.contains('liked')) {
            button.classList.remove('liked');
            button.querySelector('i').className = 'far fa-thumbs-up';
            span.textContent = count - 1;
        } else {
            button.classList.add('liked');
            button.querySelector('i').className = 'fas fa-thumbs-up';
            span.textContent = count + 1;
        }
    }

    // Toggle Replies with animation
    function toggleReplies(postId) {
        const repliesSection = document.getElementById(`replies-${postId}`);
        const button = event.target.closest('.show-replies-btn');
        const icon = button.querySelector('i');
        
        if (repliesSection.style.display === 'none') {
            repliesSection.style.display = 'block';
            button.classList.add('active');
        } else {
            repliesSection.style.display = 'none';
            button.classList.remove('active');
        }
    }

    // Open Reply Form
    function openReplyForm(postId) {
        const repliesSection = document.getElementById(`replies-${postId}`);
        const button = document.querySelector(`[data-post-id="${postId}"] .show-replies-btn`);
        
        if (repliesSection.style.display === 'none') {
            repliesSection.style.display = 'block';
            button.classList.add('active');
        }
        
        // Focus on textarea
        const textarea = document.getElementById(`reply-input-${postId}`);
        textarea.focus();
    }

    // Add Reply
    function addReply(postId) {
        const replyInput = document.getElementById(`reply-input-${postId}`);
        const replyText = replyInput.value.trim();
        
        if (replyText === '') {
            alert('Silakan tulis balasan terlebih dahulu!');
            return;
        }

        const repliesSection = document.getElementById(`replies-${postId}`);
        const replyCard = document.createElement('div');
        replyCard.className = 'reply-card';
        replyCard.innerHTML = `
            <div class="reply-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="author-avatar" style="width: 30px; height: 30px; font-size: 12px;">YA</div>
                    <div>
                        <span class="reply-author">Anda</span>
                        <span class="reply-time"> · Baru saja</span>
                    </div>
                </div>
                <div class="reply-actions">
                    <button class="reply-like-btn" onclick="likeReply(this)">
                        <i class="far fa-thumbs-up"></i>
                        <span>0</span>
                    </button>
                </div>
            </div>
            <p class="reply-content">${replyText}</p>
        `;
        
        // Insert before the input form
        const inputForm = repliesSection.querySelector('.form-group');
        repliesSection.insertBefore(replyCard, inputForm);
        
        // Update reply count
        const replyCountBtn = document.querySelector(`[data-post-id="${postId}"] .show-replies-btn .reply-count`);
        const currentCount = parseInt(replyCountBtn.textContent.split(' ')[0]);
        replyCountBtn.textContent = (currentCount + 1) + ' balasan';
        
        // Clear input
        replyInput.value = '';
        
        alert('Balasan berhasil ditambahkan!');
    }

    // Open New Post Modal
    function openNewPostModal() {
        document.getElementById('newPostModal').classList.add('active');
    }

    // Close New Post Modal
    function closeNewPostModal() {
        document.getElementById('newPostModal').classList.remove('active');
        document.getElementById('newPostForm').reset();
    }

    // Submit New Post
    document.getElementById('newPostForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const title = document.getElementById('postTitle').value;
        const content = document.getElementById('postContent').value;
        
        const newPost = document.createElement('div');
        newPost.className = 'post-card';
        const postId = Date.now();
        newPost.setAttribute('data-post-id', postId);
        
        newPost.innerHTML = `
            <div class="post-header">
                <div class="post-author">
                    <div class="author-avatar">YA</div>
                    <div class="author-info">
                        <h5>Anda</h5>
                        <span>Baru saja</span>
                    </div>
                </div>
                <div class="post-actions">
                    <button class="btn-action btn-edit" onclick="editPost(${postId})">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn-action btn-delete" onclick="deletePost(${postId})">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
            <h3 class="post-title">${title}</h3>
            <p class="post-content">${content}</p>
            
            <div class="post-interactions">
                <button class="interaction-btn like-btn" onclick="likePost(${postId}, this)">
                    <i class="far fa-thumbs-up"></i>
                    <span class="like-count">0</span>
                </button>
                <button class="interaction-btn dislike-btn" onclick="dislikePost(${postId}, this)">
                    <i class="far fa-thumbs-down"></i>
                </button>
                <button class="interaction-btn" onclick="openReplyForm(${postId})">
                    <i class="far fa-comment"></i>
                    <span>Balas</span>
                </button>
                <button class="show-replies-btn" onclick="toggleReplies(${postId})">
                    <i class="fas fa-chevron-down"></i>
                    <span class="reply-count">0 balasan</span>
                </button>
            </div>
            
            <div class="replies-section" id="replies-${postId}" style="display: none;">
                <div class="form-group" style="margin-top: 15px;">
                    <textarea class="form-control" placeholder="Tulis balasan Anda..." id="reply-input-${postId}"></textarea>
                    <button class="btn-submit" style="margin-top: 10px;" onclick="addReply(${postId})">Kirim Balasan</button>
                </div>
            </div>
        `;
        
        document.getElementById('postsContainer').insertBefore(newPost, document.getElementById('postsContainer').firstChild);
        
        closeNewPostModal();
        alert('Postingan berhasil dibuat!');
    });

    // Edit Post
    function editPost(postId) {
        const postCard = document.querySelector(`[data-post-id="${postId}"]`);
        const title = postCard.querySelector('.post-title').textContent;
        const content = postCard.querySelector('.post-content').textContent;
        
        document.getElementById('editPostId').value = postId;
        document.getElementById('editPostTitle').value = title;
        document.getElementById('editPostContent').value = content;
        
        document.getElementById('editPostModal').classList.add('active');
    }

    // Close Edit Post Modal
    function closeEditPostModal() {
        document.getElementById('editPostModal').classList.remove('active');
        document.getElementById('editPostForm').reset();
    }

    // Submit Edit Post
    document.getElementById('editPostForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const postId = document.getElementById('editPostId').value;
        const title = document.getElementById('editPostTitle').value;
        const content = document.getElementById('editPostContent').value;
        
        const postCard = document.querySelector(`[data-post-id="${postId}"]`);
        postCard.querySelector('.post-title').textContent = title;
        postCard.querySelector('.post-content').textContent = content;
        
        closeEditPostModal();
        alert('Postingan berhasil diperbarui!');
    });

    // Delete Post
    function deletePost(postId) {
        if (confirm('Apakah Anda yakin ingin menghapus postingan ini?')) {
            const postCard = document.querySelector(`[data-post-id="${postId}"]`);
            postCard.style.opacity = '0';
            postCard.style.transform = 'scale(0.9)';
            
            setTimeout(() => {
                postCard.remove();
                alert('Postingan berhasil dihapus!');
            }, 300);
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const newPostModal = document.getElementById('newPostModal');
        const editPostModal = document.getElementById('editPostModal');
        
        if (event.target === newPostModal) {
            closeNewPostModal();
        }
        if (event.target === editPostModal) {
            closeEditPostModal();
        }
    }
</script>

@endsection