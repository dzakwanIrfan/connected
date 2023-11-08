# Pemrograman Web I - Proyek Manajemen Perusahaan Fiktif

Ini adalah proyek mata kuliah Pemrograman Web I yang mengimplementasikan konsep CRUD (Create, Read, Update, Delete) pada sebuah website menggunakan Laravel 10 dan PHP 8.1.10. Proyek ini adalah kerja sama tim antara:

- DzakwanIrfan
- Buriane
- Katsuku27

## Deskripsi Proyek

Proyek ini bertujuan untuk membangun website manajemen proyek sederhana untuk perusahaan fiktif. Website ini memungkinkan pengguna untuk melakukan berbagai operasi CRUD pada data proyek, seperti membuat proyek baru, menampilkan detail proyek, mengedit proyek, dan menghapus proyek.

## Teknologi yang Digunakan

- Laravel 10
- PHP 8.1.10
- MySQL (atau database lainnya, sesuai kebutuhan)

## Struktur Proyek

Proyek ini memiliki struktur berkas dan folder yang umum digunakan dalam aplikasi Laravel. Berikut adalah beberapa komponen utama dalam proyek:

- `app/`: Berisi file-file aplikasi seperti model, controller, dan middleware.
- `resources/views/`: Berisi file-file tampilan (views) yang digunakan dalam aplikasi.
- `routes/`: Berisi definisi rute aplikasi.
- `database/migrations/`: Berisi file migrasi database untuk mengatur struktur tabel.
- `public/`: Berisi aset publik seperti file CSS, JavaScript, dan gambar.

## Penggunaan

Untuk menjalankan proyek ini, Anda dapat mengikuti langkah-langkah berikut:

1. Clone repository ini ke komputer Anda.
2. Instal dependencies dengan menjalankan `composer install`.
3. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
4. Jalankan migrasi database dengan perintah `php artisan migrate`.
5. Jalankan server pengembangan dengan perintah `php artisan serve`.

Selanjutnya, Anda dapat mengakses website di `http://localhost:8000` untuk mulai menggunakan aplikasi.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori ini, lakukan perubahan, dan buat pull request dengan deskripsi yang jelas tentang perubahan yang Anda lakukan.

## Lisensi

Proyek ini dilisensikan di bawah [Lisensi MIT](LICENSE).
