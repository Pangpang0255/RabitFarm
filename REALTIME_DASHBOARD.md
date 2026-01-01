# Real-time Dashboard Update

Dashboard monitoring RabitFarm sekarang sudah dilengkapi dengan fitur **auto-refresh real-time**.

## Fitur yang Ditambahkan:

### 1. Auto-refresh Data

-   Dashboard akan otomatis memperbarui data **setiap 30 detik**
-   Tidak perlu refresh halaman secara manual
-   Data yang di-update meliputi:
    -   Total populasi kelinci
    -   Jumlah kelinci jantan
    -   Jumlah kelinci betina
    -   Jumlah kelinci muda (sapihan & anak)
    -   Dan statistik lainnya

### 2. Indikator Update

-   Badge "Auto-refresh Active" (hijau) menandakan sistem aktif
-   Menampilkan waktu update terakhir
-   Badge dapat di-klik untuk melakukan refresh manual

### 3. Visual Feedback

-   Animasi fade saat data di-update
-   Console log untuk debugging

## Cara Kerja:

1. **Saat halaman dibuka:**

    - Data awal dimuat dari server
    - Auto-refresh timer dimulai
    - Update pertama terjadi setelah 30 detik

2. **Background Update:**

    - JavaScript fetch data dari endpoint `/dashboard/data`
    - Data JSON diterima dan diproses
    - DOM di-update tanpa reload halaman
    - Animasi smooth menandakan perubahan data

3. **Manual Refresh:**
    - Klik badge "Auto-refresh Active" untuk refresh manual
    - Badge akan menampilkan animasi loading

## Technical Details:

### Backend (Laravel):

-   **Route:** `GET /dashboard/data`
-   **Controller:** `DashboardController@getDashboardData`
-   **Response:** JSON dengan semua data statistik

### Frontend (JavaScript):

-   **Interval:** 30 detik (30000ms)
-   **Method:** Fetch API
-   **Update:** DOM manipulation

## Kustomisasi Interval:

Untuk mengubah interval update, edit file `resources/views/dashboard.blade.php`:

```javascript
// Ubah angka 30000 (30 detik) sesuai kebutuhan
refreshInterval = setInterval(updateDashboardData, 30000);

// Contoh interval lain:
// 60000 = 1 menit
// 120000 = 2 menit
// 10000 = 10 detik (tidak disarankan, terlalu sering)
```

## Monitoring:

Buka browser Console (F12) untuk melihat log update:

-   "Dashboard updated: [timestamp]" = Update berhasil
-   "Error updating dashboard" = Terjadi masalah koneksi

## Troubleshooting:

**Jika auto-refresh tidak bekerja:**

1. Pastikan server Laravel running (`php artisan serve`)
2. Buka browser Console (F12) untuk lihat error
3. Cek koneksi internet
4. Clear browser cache (Ctrl+F5)

**Jika data tidak berubah:**

-   Data hanya berubah jika ada perubahan di database
-   Tambah/edit data kelinci/transaksi untuk melihat update

## Benefit untuk User:

✅ **Real-time monitoring** - Lihat perubahan data tanpa refresh manual
✅ **User experience lebih baik** - Dashboard selalu menampilkan data terbaru
✅ **Hemat bandwidth** - Hanya data JSON yang di-download, bukan full HTML
✅ **Multi-user friendly** - User lain dapat melihat perubahan yang dilakukan user lain
✅ **Monitoring efektif** - Cocok untuk layar monitoring yang dibiarkan terbuka

## Future Enhancement:

-   Tambah real-time notification untuk event penting
-   WebSocket untuk instant update
-   Push notification browser
-   Sound alert untuk event kritis
