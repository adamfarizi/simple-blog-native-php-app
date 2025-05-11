-- Active: 1717404743217@@127.0.0.1@3306@simple-native-php-app
-- Hapus tabel kalau ada
DROP TABLE IF EXISTS articles;

DROP TABLE IF EXISTS users;

-- Buat tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Masukkan user admin (password = admin123)
INSERT INTO
    users (username, password, role)
VALUES (
        'admin',
        '$2y$10$w3gojU/23cYb3rV0zHkm.eSWCJfTg67SaFKatajqtu3zH.ZuX9CHG',
        'admin'
    );
-- Note: Ganti hash di atas dengan hasil dari password_hash('admin123', PASSWORD_DEFAULT)

-- Buat tabel produk
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    genre ENUM('Teknologi', 'Lifestyle', 'Pendidikan', 'Bisnis', 'Lainnya') NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO
    articles (title, content, genre, image)
VALUES (
        'Selamat Datang di Blog Kami',
        'Ini adalah artikel pertama di blog ini. Silakan eksplorasi konten lainnya.',
        'Lainnya',
        'uploads/welcome.jpg'
    ),
    (
        'Belajar PHP Dasar',
        'Artikel ini membahas dasar-dasar PHP, mulai dari variabel hingga function.',
        'Teknologi',
        'uploads/php.jpg'
    ),
    (
        'Tips Menulis Artikel Menarik',
        'Menulis artikel itu seni. Gunakan kalimat yang mengalir dan jangan lupa tambahkan gambar.',
        'Pendidikan',
        'uploads/writing.jpg'
    ),
    (
        'Kenapa Kamu Harus Mulai Ngeblog?',
        'Ngeblog bisa jadi sarana curhat, berbagi ilmu, bahkan dapet cuan!',
        'Lifestyle',
        'uploads/blog.jpg'
    ),
    (
        'Rekomendasi Buku Pemrograman',
        'Coba baca Clean Code, Pragmatic Programmer, dan Refactoring. Worth it!',
        'Teknologi',
        'uploads/books.jpg'
    );