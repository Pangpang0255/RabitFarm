# 🥕 SISTEM ROTASI PAKAN OTOMATIS

## ✨ Fitur Baru yang Sudah Dibuat:

### 1. **Pola Rotasi Menu 7 Hari**
Sistem otomatis dengan variasi menu berbeda setiap hari:

- **Hari 1 (Senin):** Pelet + Sayuran Kangkung
- **Hari 2 (Selasa):** Konsentrat + Rumput Gajah  
- **Hari 3 (Rabu):** Pelet + Wortel
- **Hari 4 (Kamis):** Mix Sayuran Hijau (Bayam + Kangkung) + Rumput Odot
- **Hari 5 (Jumat):** Konsentrat + Sawi Putih
- **Hari 6 (Sabtu):** Pelet + Jagung Pipilan + Rumput
- **Hari 7 (Minggu):** Menu Spesial - Konsentrat Premium + Mix Sayuran + Wortel

### 2. **Frekuensi Pemberian**
Setiap hari 3x pemberian:
- 🌅 **Pagi:** 07:00
- ☀️ **Siang:** 12:00  
- 🌆 **Sore:** 17:00

### 3. **Porsi Otomatis**
Porsi disesuaikan per jenis pakan:
- Pelet: 0.12 - 0.15 Kg
- Konsentrat: 0.12 - 0.14 Kg
- Sayuran: 0.18 - 0.22 Kg
- Rumput: 0.2 - 0.25 Kg
- Wortel/Jagung: 0.08 - 0.1 Kg

---

## 📋 Cara Menggunakan:

### **Langkah 1: Buka Dashboard Feeding**
- Masuk ke: **Pencatatan Digital → Manajemen Pakan**
- Atau langsung ke: `/dashboard/feeding`

### **Langkah 2: Klik "Generate Jadwal Otomatis"**
- Klik tombol hijau **"Generate Jadwal Otomatis"** di pojok kanan atas
- Atau tombol di card info rotasi menu

### **Langkah 3: Pilih Durasi**
Pilih berapa lama jadwal yang mau dibuat:
- **7 Hari** (1 Minggu)
- **14 Hari** (2 Minggu)
- **30 Hari** (1 Bulan)

### **Langkah 4: Sistem Bekerja Otomatis**
Sistem akan:
- ✅ Generate jadwal untuk **semua kelinci** aktif
- ✅ Rotasi menu otomatis setiap 7 hari
- ✅ Tidak duplikat jadwal yang sudah ada
- ✅ Status default: **Pending**

---

## 🔄 Cara Kerja Rotasi:

### **Siklus 7 Hari:**
```
Hari 1 → Hari 2 → Hari 3 → Hari 4 → Hari 5 → Hari 6 → Hari 7 → [Ulang ke Hari 1]
```

### **Contoh Generate 14 Hari:**
- Hari 1-7: Menu rotasi lengkap
- Hari 8-14: Menu rotasi ulang dari awal (variasi tetap berbeda)

### **Contoh Generate 30 Hari:**
- Minggu 1: Rotasi menu 1-7
- Minggu 2: Rotasi menu 1-7 (ulang)
- Minggu 3: Rotasi menu 1-7 (ulang)
- Minggu 4: Rotasi menu 1-7 (ulang)
- Sisa hari: Lanjut rotasi

---

## 💡 Keuntungan Sistem Ini:

1. **Kelinci Tidak Bosan**
   - Menu berbeda setiap hari
   - Variasi 7 jenis menu

2. **Nutrisi Seimbang**
   - Kombinasi protein (pelet, konsentrat)
   - Serat (rumput, sayuran)
   - Vitamin (wortel, sayuran hijau)
   - Karbohidrat (jagung)

3. **Hemat Waktu**
   - Tidak perlu input manual setiap hari
   - Generate 1x untuk 30 hari

4. **Otomatis & Teratur**
   - Jadwal konsisten 3x sehari
   - Porsi sudah dihitung otomatis

5. **Tidak Ada Duplikat**
   - Sistem cek jadwal yang sudah ada
   - Tidak create ulang jadwal yang sama

---

## 🔧 File yang Dibuat:

1. **Migration:** `2025_12_24_100001_create_feeding_patterns_table.php`
   - Tabel untuk menyimpan pola rotasi menu

2. **Model:** `FeedingPattern.php`
   - Model untuk feeding patterns

3. **Controller Method:** `FeedingDashboardController@generateSchedule`
   - Logic generate jadwal otomatis dengan rotasi

4. **View:** Update `feeding-dashboard.blade.php`
   - Tombol generate + modal
   - Info card pola rotasi

5. **Route:** `POST /dashboard/feeding/generate`

---

## 📊 Database Migration:

Jalankan migration untuk create tabel baru:
```bash
php artisan migrate
```

---

## 🎯 Next Steps:

Setelah generate jadwal, Anda bisa:
1. ✅ Lihat jadwal di dashboard
2. ✅ Update status jadi "Completed" setelah kasih pakan
3. ✅ Monitor kelinci yang belum diberi pakan
4. ✅ Lihat statistik konsumsi per jenis pakan
5. ✅ Generate ulang untuk periode berikutnya

---

## 🆘 Troubleshooting:

**Q: Jadwal tidak muncul?**
A: Pastikan ada kelinci aktif di database

**Q: Bisa custom menu rotasi?**
A: Ya, bisa edit di `createDefaultPattern()` method di controller

**Q: Bisa beda porsi per kelinci?**
A: Saat ini sama untuk semua, tapi bisa dikustomisasi nanti

**Q: Hapus jadwal lama?**
A: Manual delete di database atau buat fitur hapus jadwal batch

---

🎉 **Sistem sudah siap digunakan!** Generate jadwal kapan saja Anda mau!
