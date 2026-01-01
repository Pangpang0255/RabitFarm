# ⏰ SETUP REAL-TIME SYSTEM

## 🎯 Fitur Real-Time yang Sudah Dibuat:

### 1. **Auto-Generate Jadwal Setiap Hari**
- ✅ Sistem otomatis membuat jadwal pemberian pakan setiap hari
- ✅ Generate untuk 7 hari ke depan (selalu ada stok jadwal)
- ✅ Rotasi menu otomatis sesuai hari dalam seminggu
- ✅ Tidak duplikat jadwal yang sudah ada

### 2. **Real-Time Clock & Date**
- ✅ Jam digital update setiap detik
- ✅ Tanggal lengkap dalam Bahasa Indonesia
- ✅ Tombol refresh manual untuk update data terbaru

### 3. **Auto-Refresh Dashboard**
- ✅ Dashboard otomatis refresh setiap 5 menit
- ✅ Data tabel, grafik, statistik selalu fresh
- ✅ Tidak perlu refresh manual

### 4. **Data Real-Time**
- ✅ Semua query dari database selalu ambil data terbaru
- ✅ Statistik update otomatis
- ✅ Grafik menampilkan data terkini

---

## 📋 CARA SETUP REAL-TIME SYSTEM:

### **OPSI 1: Manual Command (Untuk Testing)**

Jalankan command ini kapan saja untuk generate jadwal:

```bash
php artisan feeding:generate-daily
```

Output:
```
Starting daily feeding schedule generation...
Successfully created 21 feeding schedules!
```

---

### **OPSI 2: Windows Task Scheduler (RECOMMENDED)**

Agar jadwal auto-generate **setiap hari otomatis**, setup Windows Task Scheduler:

#### **Langkah 1: Buka Task Scheduler**
1. Tekan **Windows + R**
2. Ketik: `taskschd.msc`
3. Enter

#### **Langkah 2: Create New Task**
1. Klik **"Create Basic Task"** di panel kanan
2. Name: `Laravel Feeding Scheduler`
3. Description: `Auto-generate feeding schedule daily`
4. Next

#### **Langkah 3: Set Trigger (Kapan Jalan)**
1. Trigger: **Daily**
2. Start: **Hari ini**
3. Time: **00:01 AM** (tengah malam)
4. Recur every: **1 days**
5. Next

#### **Langkah 4: Set Action (Apa yang Dijalankan)**
1. Action: **Start a program**
2. Program/script: `C:\laragon\www\RabitFarm\run-scheduler.bat`
3. Next
4. Finish

#### **Langkah 5: Edit Settings (Penting!)**
1. Klik kanan task yang baru dibuat
2. **Properties**
3. Tab **General**:
   - ✅ Centang: "Run whether user is logged on or not"
   - ✅ Centang: "Run with highest privileges"
4. Tab **Triggers**:
   - Edit trigger
   - ✅ Centang: "Repeat task every: **1 minute**" (untuk scheduler Laravel)
   - Duration: **Indefinitely**
5. Tab **Settings**:
   - ✅ Centang: "Run task as soon as possible after a scheduled start is missed"
   - ✅ UNCHECK: "Stop the task if it runs longer than..."
6. OK

---

### **OPSI 3: Manual Cron (Linux/Mac)**

Jika di server Linux, edit crontab:

```bash
crontab -e
```

Tambahkan:
```
* * * * * cd /path/to/RabitFarm && php artisan schedule:run >> /dev/null 2>&1
```

---

## 🔍 CARA CEK SYSTEM BERJALAN:

### **1. Cek Log Scheduler**
Buka file: `storage/logs/scheduler.log`

Isi contoh:
```
[2025-12-24 00:01:00] Starting daily feeding schedule generation...
[2025-12-24 00:01:05] Successfully created 63 feeding schedules!
[2025-12-24 06:00:00] Starting daily feeding schedule generation...
[2025-12-24 06:00:02] Successfully created 0 feeding schedules! (already exists)
```

### **2. Cek Log Feeding**
Buka file: `storage/logs/feeding-schedule.log`

### **3. Cek Database**
Query:
```sql
SELECT * FROM feeding_schedules 
WHERE feeding_date >= CURDATE() 
ORDER BY feeding_date, feeding_time;
```

Harus ada jadwal untuk 7 hari ke depan!

### **4. Cek Dashboard**
- Buka dashboard feeding
- Lihat card "Rotasi Menu Hari Ini" → harus sesuai hari ini
- Lihat jadwal upcoming → harus ada untuk hari ini + 6 hari kedepan

---

## ⚙️ CARA KERJA SISTEM:

### **Timeline Otomatis:**

```
00:01 AM → Auto-generate jadwal untuk hari ini + 6 hari kedepan
06:00 AM → Backup generate (jika ada yang terlewat)
Setiap 5 menit → Dashboard auto-refresh di browser user
Setiap detik → Real-time clock update
```

### **Generate Logic:**

1. **Setiap Hari Jam 00:01:**
   - System cek pola rotasi aktif
   - Hitung hari rotasi (Senin=1, Selasa=2, dst)
   - Generate jadwal untuk hari ini + 6 hari
   - Cek duplikat (tidak create ulang yang sudah ada)
   - Simpan ke database dengan notes "Auto-generated (Rotasi Hari X)"

2. **Rotasi Otomatis:**
   ```
   Senin    → Generate Hari 1 (Pelet + Kangkung)
   Selasa   → Generate Hari 2 (Konsentrat + Rumput)
   Rabu     → Generate Hari 3 (Pelet + Wortel)
   Kamis    → Generate Hari 4 (Mix Sayuran)
   Jumat    → Generate Hari 5 (Konsentrat + Sawi)
   Sabtu    → Generate Hari 6 (Pelet + Jagung)
   Minggu   → Generate Hari 7 (Menu Spesial)
   [ULANG KE HARI 1 LAGI]
   ```

3. **Dashboard Real-Time:**
   - Jam update setiap detik (JavaScript)
   - Data refresh otomatis setiap 5 menit
   - User bisa manual refresh dengan tombol

---

## 🎨 Fitur Real-Time di Dashboard:

### **1. Header Real-Time**
```
┌──────────────────────────────────────────────┐
│ 📅 Selasa, 24 Desember 2025  |  🕐 14:30:45  │
│                            [🔄 Refresh Data]  │
└──────────────────────────────────────────────┘
```
- Tanggal: Format lengkap Indonesia
- Jam: Update setiap detik
- Tombol: Refresh manual

### **2. Card Rotasi Hari Ini**
Otomatis update sesuai hari dalam seminggu:
```
┌─────────────────────────────┐
│  Rotasi Menu Hari Ini       │
│                              │
│        HARI 2                │
│  Konsentrat & Rumput         │
│                              │
│  📊 Rotasi siklus 7 hari    │
└─────────────────────────────┘
```

### **3. Statistik Real-Time**
Semua angka dari database terbaru:
- Total Pemberian (update real-time)
- Konsumsi Bulan Ini (sum real-time)
- Rata-rata Harian (calculated real-time)
- Tingkat Selesai (percentage real-time)

### **4. Tabel & Grafik**
- Query selalu fresh dari database
- Tidak ada cache
- Langsung tampil data terbaru

---

## 🆘 TROUBLESHOOTING:

### **Problem: Jadwal tidak auto-generate**

**Cek 1: Windows Task Scheduler berjalan?**
```
1. Buka Task Scheduler
2. Cari task "Laravel Feeding Scheduler"
3. Lihat kolom "Last Run Time" → harus update terus
4. Lihat kolom "Last Run Result" → harus (0x0) = success
```

**Cek 2: File batch bisa dijalankan?**
```bash
# Test manual
C:\laragon\www\RabitFarm\run-scheduler.bat
```

**Cek 3: Command Laravel berjalan?**
```bash
php artisan feeding:generate-daily
```

### **Problem: Dashboard tidak update**

**Solusi:**
1. Tekan Ctrl+F5 (hard refresh)
2. Klik tombol "Refresh Data"
3. Clear browser cache
4. Tunggu 5 menit (auto-refresh)

### **Problem: Jam tidak update**

**Solusi:**
1. Cek JavaScript console (F12)
2. Pastikan tidak ada error
3. Refresh halaman

### **Problem: Rotasi hari salah**

**Cek:**
1. Tanggal server benar?
2. Timezone PHP: `Asia/Jakarta`
3. Database timezone sama dengan server

---

## 📊 MONITORING SYSTEM:

### **Log Files:**
```
storage/logs/scheduler.log        → Log task scheduler
storage/logs/feeding-schedule.log → Log generate jadwal
storage/logs/laravel.log          → Log error aplikasi
```

### **Database Check:**
```sql
-- Cek jadwal hari ini
SELECT COUNT(*) FROM feeding_schedules WHERE feeding_date = CURDATE();

-- Cek jadwal 7 hari kedepan
SELECT feeding_date, COUNT(*) as total
FROM feeding_schedules 
WHERE feeding_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
GROUP BY feeding_date;
```

---

## ✅ CHECKLIST SETUP BERHASIL:

- [ ] Command manual berjalan: `php artisan feeding:generate-daily`
- [ ] Windows Task Scheduler created
- [ ] Task berjalan setiap menit (check "Last Run Time")
- [ ] Log file `scheduler.log` ada dan update
- [ ] Database ada jadwal untuk 7 hari kedepan
- [ ] Dashboard tampil jam real-time (update setiap detik)
- [ ] Card "Rotasi Menu Hari Ini" sesuai hari sekarang
- [ ] Auto-refresh jalan (tunggu 5 menit)
- [ ] Tombol "Refresh Data" berfungsi

---

## 🎉 SELESAI!

Sistem Real-Time sudah aktif! Jadwal akan **auto-generate setiap hari**, dashboard **selalu update**, dan rotasi menu **berjalan otomatis**!

**Next Day:**
- Besok jam 00:01 system auto-generate jadwal baru
- Rotasi hari otomatis berubah
- Tidak perlu manual lagi!

🐰🥕 **Kelinci Anda akan dapat pakan dengan jadwal yang selalu update dan menu yang bervariasi setiap hari!**
