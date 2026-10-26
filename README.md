# Tugas Laravel CRUD Data Dosen

Aplikasi CRUD sederhana untuk mengelola data dosen menggunakan Laravel dan Blade. Pengguna dapat menambah, melihat, mengubah, dan menghapus data dosen.

## Fitur

- Menambahkan data dosen
- Melihat daftar dosen
- Mengubah data dosen
- Menghapus data dosen
- Menampilkan pesan berhasil setelah operasi CRUD

## Teknologi

- PHP 8.3+
- Laravel 13
- SQLite
- Composer
- Node.js dan npm
- Vite

## Persyaratan

Pastikan perangkat sudah memiliki:

- PHP 8.3 atau lebih baru
- Composer
- Node.js dan npm
- Ekstensi PHP yang dibutuhkan Laravel

## Cara Menjalankan Projek

1. Masuk ke folder projek.

```bash
cd "tugas laravel crud"
```

2. Instal dependency PHP dan JavaScript.

```bash
composer install
npm install
```

3. Buat file konfigurasi environment.

```bash
cp .env.example .env
```

Pada Windows PowerShell, gunakan perintah berikut jika `cp` tidak tersedia:

```powershell
Copy-Item .env.example .env
```

4. Buat application key.

```bash
php artisan key:generate
```

5. Buat database SQLite.

```bash
php artisan migrate --seed
```

Jika file database belum ada pada Windows, jalankan:

```powershell
New-Item database/database.sqlite -ItemType File
php artisan migrate --seed
```

6. Jalankan server Laravel dan Vite melalui terminal terpisah.

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

7. Buka aplikasi melalui:

```text
http://127.0.0.1:8000
```

## Data Awal

Seeder membuat dua contoh data dosen. Database juga membuat akun contoh:

```text
Email: test@example.com
Password: password
```

## Struktur Data Dosen

| Field | Keterangan |
|---|---|
| NIDN | Nomor induk dosen nasional |
| Nama | Nama lengkap dosen |
| Jabatan | Jabatan dosen |
| Kepakaran | Bidang keahlian dosen |

## Perintah Pengujian

```bash
php artisan test
```

## Catatan

Pastikan aplikasi dijalankan dengan konfigurasi `.env` yang benar. Projek ini menggunakan SQLite secara bawaan, sehingga tidak memerlukan konfigurasi MySQL untuk dijalankan secara lokal.
