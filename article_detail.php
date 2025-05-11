<?php
include 'controllers/auth.php';
include 'controllers/article.php';

if (is_logged_in()) {
    header("Location: views/dashboard.php");
    exit;
}

$data = get_article(id: $_GET['id']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['title'] ?> - Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .article-image {
            height: 300px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Web Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <img src="<?= $data['image'] ?>" class="card-img-top article-image" alt="Gambar Artikel">
                    <div class="card-body">
                        <h1 class="card-title"><?= $data['title'] ?></h1>
                        <p class="text-muted">Genre: <span class="badge bg-info text-dark"><?= $data['genre'] ?></span>
                        </p>
                        <hr>
                        <p class="card-text"><?= nl2br($data['content']) ?></p>
                        <a href="index.php" class="btn btn-secondary mt-3">← Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 Web Blog. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>