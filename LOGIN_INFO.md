# Informasi Login RabitFarm

## ✅ Fitur yang Telah Ditambahkan

### 1. **Tombol Login di Navbar**

-   Tombol login hijau dengan icon di navbar
-   Muncul di semua halaman (home.blade.php dan layouts/app.blade.php)
-   Klik tombol akan mengarahkan ke halaman login

### 2. **Halaman Login (/login)**

-   Form login dengan email dan password
-   Validasi input otomatis
-   Pesan error jika login gagal
-   Remember me checkbox
-   Link ke halaman register

### 3. **Halaman Register (/register)**

-   Form registrasi dengan nama, email, password, dan konfirmasi password
-   Validasi lengkap:
    -   Email harus unik (tidak boleh duplikat)
    -   Password minimal 6 karakter
    -   Password harus sama dengan konfirmasi password
-   Password strength indicator

### 4. **Fungsi Logout**

-   Menghapus session dan mengembalikan ke halaman login

## 🔐 Cara Menggunakan

### Login dengan User Test:

```
Email: admin@rabitfarm.com
Password: admin123
```

### Atau Daftar User Baru:

1. Klik tombol **Login** di navbar
2. Klik link **"Daftar Sekarang"**
3. Isi form registrasi:
    - Nama lengkap
    - Email (harus unik)
    - Password (minimal 6 karakter)
    - Konfirmasi password
4. Klik tombol **Daftar**

### Setelah Login:

-   Otomatis diarahkan ke `/dashboard`
-   Session tersimpan (jika centang "Ingat Saya")

## 🛠️ Route Authentication

| Method | URL       | Nama Route    | Fungsi                  |
| ------ | --------- | ------------- | ----------------------- |
| GET    | /login    | login         | Tampilkan form login    |
| POST   | /login    | login.post    | Proses login            |
| GET    | /register | register      | Tampilkan form register |
| POST   | /register | register.post | Proses register         |
| POST   | /logout   | logout        | Logout user             |

## 🔒 Validasi

### Login:

-   Email wajib dan harus format email valid
-   Password wajib minimal 6 karakter
-   Kredensial harus cocok dengan database

### Register:

-   Nama wajib diisi
-   Email wajib, format valid, dan belum terdaftar
-   Password minimal 6 karakter
-   Konfirmasi password harus sama dengan password

## 📝 Pesan Error

Sistem akan menampilkan pesan error jika:

-   Email atau password salah saat login
-   Email sudah terdaftar saat register
-   Password tidak sesuai validasi
-   Field wajib tidak diisi

## 🎨 Tampilan

-   Design modern dengan gradient purple-blue
-   Responsive untuk mobile dan desktop
-   Icon Font Awesome untuk visual menarik
-   Animasi smooth pada button hover
-   Alert box untuk error dan success message

## 💡 Tips

1. **Lupa Password?** - Saat ini belum ada fitur reset password, pastikan ingat password Anda
2. **Remember Me** - Centang "Ingat Saya" agar tidak perlu login berulang kali
3. **Keamanan** - Password di-hash dengan bcrypt untuk keamanan maksimal
