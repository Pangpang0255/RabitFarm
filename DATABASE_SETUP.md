# Setup Database untuk RabitFarm

## Langkah-langkah Setup:

### 1. Buat Database di MySQL (via Laragon)

Buka **HeidiSQL** atau **phpMyAdmin** dari Laragon Menu, lalu jalankan query berikut:

```sql
CREATE DATABASE IF NOT EXISTS rabitfarm CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Jalankan Migration

Buka terminal di folder project, lalu jalankan:

```bash
php artisan migrate
```

Ini akan membuat tabel-tabel berikut:
- `users` - Tabel pengguna
- `rabbits` - Database kelinci
- `breeding_schedules` - Jadwal perkawinan
- `feeding_schedules` - Jadwal pemberian pakan
- `transactions` - Transaksi keuangan
- `health_records` - Catatan kesehatan

### 3. (Opsional) Isi Data Sample

Untuk mengisi database dengan data sample, jalankan:

```bash
php artisan db:seed --class=CreateDatabaseSeeder
```

### 4. Konfigurasi File .env

Pastikan file `.env` sudah dikonfigurasi dengan benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rabitfarm
DB_USERNAME=root
DB_PASSWORD=
```

## Struktur Tabel

### Table: rabbits
- id
- user_id (FK ke users)
- code (unique, contoh: RB0001)
- name
- gender (jantan/betina)
- status (dewasa/anak/siap_kawin)
- breed
- birth_date
- weight
- health_status (sehat/sakit/karantina)
- notes
- timestamps
- soft_deletes

### Table: breeding_schedules
- id
- user_id (FK)
- female_rabbit_id (FK ke rabbits)
- male_rabbit_id (FK ke rabbits)
- breeding_date
- expected_birth_date
- status (dijadwalkan/berlangsung/selesai/gagal)
- offspring_count
- notes
- timestamps

### Table: feeding_schedules
- id
- user_id (FK)
- rabbit_id (FK ke rabbits)
- feeding_date
- feeding_time
- feed_type
- quantity
- status (pending/completed)
- notes
- timestamps

### Table: transactions
- id
- user_id (FK)
- transaction_date
- description
- category (pakan/obat/penjualan/peralatan/lainnya)
- type (income/expense)
- amount
- notes
- timestamps

### Table: health_records
- id
- user_id (FK)
- rabbit_id (FK ke rabbits)
- check_date
- diagnosis
- symptoms
- treatment
- medicine
- next_check_date
- status (dalam_perawatan/sembuh/memburuk)
- notes
- timestamps

## Fitur Multi-User

Semua data dikaitkan dengan `user_id`, sehingga:
- Setiap user hanya melihat data miliknya sendiri
- Data terisolasi antar user
- Saat user dihapus, semua datanya akan terhapus otomatis (cascade delete)

## Testing

Setelah setup selesai, Anda bisa:
1. Buka browser ke `http://localhost/RabitFarm/public`
2. Dashboard akan menampilkan statistik dari database
3. Semua halaman (Monitoring, Recording, Database Ternak, Laporan Keuangan) sudah terhubung dengan database

## Troubleshooting

### Migration Error
Jika terjadi error saat migration:
1. Pastikan MySQL di Laragon sudah running
2. Pastikan database `rabitfarm` sudah dibuat
3. Cek kredensial di file `.env`

### Data Tidak Muncul
1. Pastikan sudah ada data user di tabel `users` (gunakan seeder)
2. Session `user_id` saat ini di-set ke 1 (nanti akan diganti dengan auth system)

### Port MySQL
Jika Laragon menggunakan port MySQL selain 3306, update di `.env`:
```env
DB_PORT=3307
```
