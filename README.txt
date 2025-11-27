Baik. Kalau file-based download sedang tidak bisa, opsi paling aman adalah saya **gabungkan semuanya menjadi satu README lengkap dalam bentuk teks** sehingga kamu bisa langsung copy dan simpan sendiri sebagai `.docx` atau `.txt`.

Berikut versi **FINAL README UKK** lengkap dengan:

✔ Instalasi Laravel
✔ Setup database
✔ Cara running
✔ Login
✔ Command penting Laravel
✔ Troubleshooting umum

---

# README-UKK – Pisces Accessories (Aplikasi Kasir)

## 1. Kebutuhan Sistem

• Laragon
• PHP 8.x
• MySQL
• Composer
• Browser (Chrome dsb.)

---

## 2. Instalasi Project

A. Ambil project

```
git clone <repo-github> pisces
cd pisces
```

(atau ekstrak folder ZIP ke `C:\laragon\www\pisces`)

B. Install dependency

```
composer install atau kalo error composer install --ignore-platform-reqs
```

C. Copy konfigurasi environment

```
copy .env.example .env
```

D. Generate app key Laravel

```
php artisan key:generate
```

---

## 3. Setup Database

A. Buka phpMyAdmin
B. Buat database baru:

```
pisces_db
```

C. Import database:
• Menu Import
• Pilih file `pisces.sql`
• Klik Go

D. Pastikan file `.env`:

```
DB_DATABASE=pisces_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 4. Menjalankan Aplikasi

Pastikan MySQL Laragon sudah berjalan

```
php artisan serve
```

Akses aplikasi:

```
http://127.0.0.1:8000
```

---

## 5. Login Default

```
Username: root
Password: root123
```

---

## 6. Command Laravel Penting

Perintah | Fungsi
|—|—|
php artisan serve | Menjalankan server
php artisan key:generate | Generate key aplikasi
php artisan config:clear | Clear config cache
composer install | Install dependency vendor
php artisan migrate | Build tabel database (jika kosong)
php artisan migrate:fresh --seed | Reset database dari nol
php artisan route:list | Menampilkan semua route

---

## 7. Troubleshooting (Sering Muncul Saat UKK)

Masalah | Penyebab | Solusi Cepat
|—|—|—|
Halaman putih | Key belum ada | php artisan key:generate + restart serve
Tidak bisa login | DB belum di-import | Import pisces.sql
Duplicate migration | DB sudah pernah dibuat | php artisan migrate:fresh --seed
Port bentrok | XAMPP masih hidup | Matikan XAMPP / ubah port Laragon
Gambar tidak tampil | Folder assets tidak ada | Pastikan `public/images/produk` ada
Access Denied DB | Username/password salah | Cek .env dan phpMyAdmin

Jawaban jika penguji bertanya:

> “Kenapa pakai migrate:fresh?”
> Karena database sudah memiliki tabel sebelumnya sehingga perlu reset agar migration sesuai struktur terbaru.

---

## 8. Catatan Keamanan Ujian

• Simpan file `.env` dengan benar
• Jangan menjalankan migration sembarangan jika sudah ada data
• Bawa **cadangan ZIP project + pisces.sql** di flashdisk & Drive
• Jika PC berantakan, ulang dari **Import database + composer install** → **jalan**

====================================================================================================

Kamu tinggal COPY semua teks ini ke:

```
README-UKK-Pisces.docx
```

atau `.txt`

Kalau kamu mau, aku bisa:
• Format ini jadi **Microsoft Word** dengan tabel rapi, header, logo Pisces
• Tambahkan **Cheat Sheet Tanya Jawab** tentang diagram
• Tambahkan **alur login + middleware enforcement** sebagai penjelasan saat tanya jawab
• Buat lembar **evaluasi bug** (kalau penguji suruh perbaiki di tempat)

Apakah kamu mau saya tambahkan juga:
A. Ringkasan simbol Use Case, Activity, Class, ERD
B. Jawaban singkat jika ditanya “kenapa pakai middleware?”
C. Alur data dari scanning QR → transaksi → struk → riwayat?

Tinggal jawab: **A, B, C atau semua**?
