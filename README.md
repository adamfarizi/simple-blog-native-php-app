# Aplikasi Manajemen Produk

Aplikasi sederhana berbasis PHP untuk mengelola data produk. Aplikasi ini mendukung fitur login, melihat daftar produk, menambah, mengedit, dan menghapus produk. Antarmuka pengguna dibangun dengan Bootstrap.

## Fitur

- Login user
- Daftar produk
- Tambah produk
- Edit produk
- Hapus produk
- Validasi login

## Teknologi yang Digunakan

- PHP Native
- MySQL
- Bootstrap 5

## Struktur Folder

```

project/
├── public/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── \[file js tambahan jika ada]
│   └── product\_list.php
├── controllers/
│   ├── auth.php
│   └── product.php
├── layouts/
│   ├── header.php
│   └── footer.php
├── database/
│   └── connection.php
└── README.md

````

## Instalasi

1. Clone project ini:

```bash
git clone https://github.com/adamfarizi/simple-native-php-app.git
````

2. Import database dari file `database.sql` (jika tersedia).
3. Edit file koneksi di `database/connection.php` sesuai konfigurasi lokalmu.
4. Jalankan di localhost dengan `XAMPP` atau `Laragon`.
