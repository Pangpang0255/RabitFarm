# Breeding Program - Panduan Lengkap

## Akses Halaman Breeding Program

**URL:** `http://localhost:8000/breeding`

**Atau via menu:**

-   Dashboard → Pencatatan Digital → Breeding Program (klik "Kelola Data")

---

## Fitur-Fitur

### 1. **Dashboard Statistik**

Menampilkan 6 card statistik:

-   ✅ **Total Breeding** - Total semua program breeding
-   ⏰ **Dijadwalkan** - Breeding yang menunggu kelahiran
-   ✅ **Selesai** - Breeding yang sudah melahirkan
-   ❌ **Dibatalkan** - Breeding yang gagal/dibatalkan
-   📅 **Bulan Ini** - Breeding bulan berjalan
-   👶 **Total Anak** - Total anak kelinci yang lahir

### 2. **Filter Tab**

Filter data berdasarkan status:

-   **Semua** - Tampilkan semua data
-   **Dijadwalkan** - Hanya yang menunggu kelahiran
-   **Selesai** - Hanya yang sudah melahirkan
-   **Dibatalkan** - Hanya yang dibatalkan

### 3. **Search Box**

Cari data breeding berdasarkan:

-   Kode kelinci
-   Nama kelinci
-   Ras kelinci

### 4. **Tabel Data Breeding**

Informasi lengkap:

-   **#** - Nomor urut
-   **Tanggal Kawin** - Kapan dikawinkan + berapa lama yang lalu
-   **Betina (Indukan)** - Kode, nama, ras kelinci betina
-   **Jantan (Pejantan)** - Kode, nama, ras kelinci jantan
-   **Perkiraan Lahir** - Tanggal perkiraan + countdown
-   **Jumlah Anak** - Berapa ekor anak yang lahir
-   **Status** - Badge status (Dijadwalkan/Selesai/Dibatalkan)
-   **Aksi** - Tombol View, Edit, Delete

---

## Cara Menggunakan

### **A. Menambah Jadwal Breeding Baru**

1. Klik tombol **"Tambah Jadwal Breeding"** (merah, pojok kanan atas)
2. Pilih **Kelinci Betina (Indukan)**
3. Pilih **Kelinci Jantan (Pejantan)**
4. Tentukan **Tanggal Kawin**
5. Tambahkan **Catatan** (opsional)
6. Klik **"Simpan Jadwal"**

**Sistem otomatis:**

-   Menghitung perkiraan tanggal lahir (30 hari setelah kawin)
-   Set status = "Dijadwalkan"

**Tips Breeding:**

-   Pastikan kedua kelinci berumur minimal 6 bulan
-   Kelinci betina idealnya tidak lebih dari 3 tahun
-   Hindari inbreeding (perkawinan sedarah)
-   Cek kehamilan dengan palpasi setelah 12-14 hari

---

### **B. Melihat Detail Breeding**

1. Klik tombol **👁️ (mata/view)** pada data breeding
2. Modal akan menampilkan:
    - Info lengkap indukan (betina)
    - Info lengkap pejantan (jantan)
    - Tanggal kawin & perkiraan lahir
    - Tanggal lahir aktual & jumlah anak
    - Status dan catatan

---

### **C. Update Status Breeding (Setelah Kelahiran)**

1. Klik tombol **✏️ (edit)** pada data breeding
2. Update **Status:**
    - **Dijadwalkan** = Masih menunggu kelahiran
    - **Selesai** = Sudah melahirkan
    - **Dibatalkan** = Gagal hamil/dibatalkan
3. Jika sudah lahir, isi:
    - **Tanggal Lahir Aktual** - Tanggal benar-benar melahirkan
    - **Jumlah Anak Lahir** - Berapa ekor anak
4. Tambahkan **Catatan** (kondisi kelahiran, komplikasi, dll)
5. Klik **"Update Data"**

---

### **D. Menghapus Data Breeding**

1. Klik tombol **🗑️ (sampah/delete)**
2. Konfirmasi penghapusan
3. Data akan terhapus permanent

---

## Indikator Visual

### **Badge Status:**

-   🟡 **Dijadwalkan** (kuning) - Menunggu kelahiran
-   🟢 **Selesai** (hijau) - Sudah melahirkan
-   ⚫ **Dibatalkan** (abu-abu) - Gagal/dibatalkan

### **Countdown Perkiraan Lahir:**

-   ⚠️ **"X hari lagi"** (kuning) - Belum waktunya
-   🔴 **"HARI INI!"** (merah) - Hari perkiraan lahir
-   ⚪ **"X hari lalu"** (abu) - Sudah lewat perkiraan

### **Jumlah Anak:**

-   🟢 **Badge hijau** - Sudah ada anak lahir
-   ⚪ **"-"** - Belum lahir

---

## Timeline Breeding (Contoh)

### **Hari ke-1: Kawin**

```
User input:
- Betina: RBT-F001
- Jantan: RBT-M001
- Tanggal: 1 Jan 2026

Sistem set:
- Status: Dijadwalkan
- Perkiraan lahir: 31 Jan 2026 (30 hari)
```

### **Hari ke-12-14: Cek Kehamilan**

```
User lakukan palpasi (cek kehamilan manual)
Tambah catatan di breeding record
```

### **Hari ke-30-32: Kelahiran**

```
Kelinci melahirkan 6 ekor anak

User update:
- Status: Selesai
- Tanggal lahir aktual: 30 Jan 2026
- Jumlah anak: 6 ekor
- Catatan: "Semua lahir sehat"
```

### **Hari ke-35: Siap Breeding Lagi**

```
Setelah anak disapih (35-40 hari)
Kelinci betina siap dikawinkan lagi
Buat jadwal breeding baru
```

---

## Data Yang Ditampilkan

### **Kelinci Betina/Jantan Tersedia:**

Hanya kelinci dengan kriteria:

-   ✅ Gender: Betina (untuk indukan) / Jantan (untuk pejantan)
-   ✅ Status: Produktif
-   ✅ Kesehatan: Sehat

Jika tidak ada kelinci tersedia:

-   ⚠️ Warning akan ditampilkan di form
-   Perlu tambah kelinci baru di Database Ternak

---

## Manfaat Untuk Breeder

1. **📊 Tracking Lengkap**
    - Semua program breeding tercatat
    - History perkawinan tersimpan rapi
2. **🔔 Reminder Otomatis**
    - Countdown hari kelahiran
    - Alert "HARI INI" untuk perkiraan lahir
3. **📈 Analisis Produktivitas**
    - Total anak per breeding
    - Indukan mana yang paling produktif
    - Success rate breeding
4. **🧬 Genealogi**
    - Tahu siapa induk & bapak setiap anak
    - Hindari inbreeding
    - Track bloodline kelinci
5. **📅 Planning Breeding**
    - Jadwalkan breeding berikutnya
    - Rotasi indukan
    - Optimasi produksi

---

## Troubleshooting

**❓ Tidak ada kelinci di dropdown?**

-   Pastikan sudah ada kelinci di Database Ternak
-   Cek status kelinci = "Produktif"
-   Cek kesehatan = "Sehat"

**❓ Tanggal perkiraan tidak akurat?**

-   Sistem pakai standar 30 hari
-   Aktualnya bisa 28-32 hari
-   Update dengan tanggal lahir aktual setelah melahirkan

**❓ Data tidak muncul setelah tambah?**

-   Clear cache browser (Ctrl+F5)
-   Cek apakah ada error message
-   Pastikan semua field required terisi

---

## Export Data (Coming Soon)

Fitur yang akan datang:

-   📄 Export ke Excel/PDF
-   📊 Grafik produktivitas breeding
-   📧 Email reminder perkiraan lahir
-   📱 Push notification

---

**Server:** http://localhost:8000
**Halaman:** http://localhost:8000/breeding

Selamat menggunakan Breeding Program! 🐰❤️
