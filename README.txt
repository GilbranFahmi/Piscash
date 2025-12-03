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

git pull --rebase origin main

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

Berikut **prosedur lengkap dan benar** untuk menjalankan project Laravel kamu dari Git di PC sekolah. Singkat, terurut, dan bisa langsung kamu ikuti atau bagikan ke teman/guru.

---

# Deployment Laravel dari Git (PC Sekolah)

## A. Pastikan software ini sudah tersedia

Jika belum, install dulu:

1. Git
2. Composer
3. PHP (minimal 8.x)
4. Database server (MariaDB/MySQL)
5. Node.js & NPM

---

## B. Clone Project dari GitHub

Masuk ke folder yang kamu mau:

```sh
git clone https://github.com/NAMA-USER/NAMA-REPO.git
cd NAMA-REPO
```

---

## C. Install Dependency Laravel

Jalankan:

```sh
composer install
```

Install frontend dependencies:

```sh
npm install
```

---

## D. Setup Environment

Copy konfigurasi contoh:

```sh
cp .env.example .env
```

Generate app key:

```sh
php artisan key:generate
```

---

## E. Atur Database

1. Buat database baru di MySQL/MariaDB (nama bebas)
2. Edit file `.env`

Contoh:

```
DB_DATABASE=pisces_db
DB_USERNAME=root
DB_PASSWORD=
```

Jika perlu migrasi tabel:

```sh
php artisan migrate
```

Jika kamu punya seeder:

```sh
php artisan db:seed
```

---

## F. Build Frontend (Bootstrap/Tailwind/JS)

Mode produksi:

```sh
npm run build
```

Jika untuk development:

```sh
npm run dev
```

---

## G. Jalankan Server Laravel

```sh
php artisan serve
```

Akses di browser:

```
http://127.0.0.1:8000
```

---

# Catatan Penting untuk Proyek Kamu

Karena kamu pakai **ekspor Excel**, pastikan di PC sekolah:

```sh
composer require maatwebsite/excel
```

Jika sudah ada di `composer.json`, composer install akan otomatis mengaktifkan.

---

## Troubleshooting cepat

| Error                           | Solusi                              |
| ------------------------------- | ----------------------------------- |
| Class not found / vendor hilang | `composer install`                  |
| UI tidak tampil                 | `npm install && npm run build`      |
| 404 setelah clone               | Cek route atau `.env` URL           |
| Database error                  | Sesuaikan `.env` + jalankan migrate |
| Gambar background tidak muncul  | Cek folder `public/images/`         |

---

## Opsional: Dokumentasi TXT untuk PC lain

Saya bisa buatkan file `SETUP.txt` yang otomatis masuk repository agar siap baca ketika clone.

Mau saya tambahkan ke repo kamu?

• Bahasa Indonesia
• Singkat
• Guru/teman pun bisa ikutin

Jawab:

```
Ya, tambahkan SETUP.txt
```

atau

Kalau kamu mau, saya bisa buat **script otomatis**:

```
setup.bat
```

yang bakal menjalankan semua command hanya dengan **double-click**.

Tinggal jawab:

```
Saya mau setup.bat juga
```

Mau yang mana?



