# 🔐 Sistem Login & Register - RabitFarm

## ✅ Instalasi Selesai!

Sistem authentication sudah siap digunakan dengan fitur lengkap:

### 📋 Fitur yang Tersedia:

1. **Form Login** (`/login`)

    - Login dengan email & password
    - Remember me
    - Validasi form
    - Notifikasi error/success

2. **Form Register** (`/register`)

    - Registrasi user baru
    - Password strength indicator
    - Validasi email unik
    - Konfirmasi password
    - Auto login setelah register

3. **Logout** (`/logout`)

    - Hapus session
    - Redirect ke login

4. **Session Management**
    - Menyimpan: user_id, user_name, user_email
    - Digunakan untuk filter data per user

---

## 🚀 Cara Menggunakan:

### 1️⃣ Akses Form Login

```
http://localhost:8000/login
```

### 2️⃣ Login dengan Akun Demo

**Akun 1:**

-   Email: `admin@rabitfarm.com`
-   Password: `password123`

**Akun 2:**

-   Email: `demo@rabitfarm.com`
-   Password: `demo123`

### 3️⃣ Atau Daftar Akun Baru

-   Klik "Daftar Sekarang" di halaman login
-   Isi form registrasi
-   Otomatis login setelah berhasil daftar

### 4️⃣ Logout

-   Klik nama user di navbar (kanan atas)
-   Pilih "Logout"

---

## 🗄️ Database

Tabel `users` sudah dibuat dengan struktur:

-   id (primary key)
-   name
-   email (unique)
-   password (hashed)
-   remember_token
-   timestamps

---

## 🎨 Tampilan

-   **Modern gradient design** (ungu/biru)
-   **Responsive** untuk mobile & desktop
-   **Password strength indicator** saat register
-   **Icon Font Awesome** untuk visual menarik
-   **Alert notifications** untuk feedback user

---

## 🔒 Keamanan

✅ Password di-hash dengan `Hash::make()`
✅ Validasi input server-side
✅ CSRF protection otomatis
✅ Email harus unik
✅ Password minimal 6 karakter

---

## 📝 Testing

1. Buka terminal
2. Jalankan: `php artisan serve`
3. Buka browser: `http://localhost:8000/login`
4. Login dengan akun demo atau daftar baru

---

## 🎯 Next Steps (Opsional)

Untuk keamanan lebih lanjut, bisa tambahkan:

-   [ ] Email verification
-   [ ] Forgot password / Reset password
-   [ ] Google/Facebook OAuth
-   [ ] Two-Factor Authentication (2FA)
-   [ ] Rate limiting untuk prevent brute force
-   [ ] Middleware untuk proteksi routes
-   [ ] Role & permissions (admin, user, dll)

---

**Sistem sudah 100% siap digunakan!** 🎉

Login sekarang dan mulai kelola peternakan kelinci Anda! 🐰
