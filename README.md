# Simple PHP Web Blog

A lightweight web blog built with native PHP, MySQLi, and Bootstrap.  
Supports user authentication, article management (CRUD), image uploads, and genre-based filtering.

---

## Features

- User login & logout
- Admin dashboard
- CRUD Artikel (Create, Read, Update, Delete)
- Upload gambar ke folder `uploads/`
- Genre artikel sebagai enum dengan dropdown saat tambah/edit
- Tampilkan artikel dalam bentuk card (Bootstrap)
- Filter artikel berdasarkan genre
- Halaman detail artikel untuk user dan admin
- Responsive UI dengan Bootstrap 5

## Instalasi

1. Clone project ini:

```bash
git clone https://github.com/adamfarizi/simple-blog-native-php-app.git
````

2. Import database dari file `database.sql` (jika tersedia).
3. Edit file koneksi di `database/connection.php` sesuai konfigurasi lokalmu.
4. Jalankan di localhost dengan `XAMPP` atau `Laragon`.
