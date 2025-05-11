<?php
include 'controllers/auth.php';
include 'controllers/article.php';

if (is_logged_in()) {
    header("Location: views/dashboard.php");
    exit;
}

$genreList = ['Teknologi', 'Lifestyle', 'Pendidikan', 'Bisnis', 'Lainnya'];

if (isset($_GET['genre']) && in_array($_GET['genre'], $genreList)) {
    $selectedGenre = $_GET['genre'];
    $articles = get_articles_by_genre($selectedGenre);
} else {
    $articles = get_articles(); // ambil semua
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item <?= !isset($selectedGenre) ? 'active' : '' ?>">Semua
                        Genre</a>
                    <?php foreach ($genreList as $genre): ?>
                        <a href="index.php?genre=<?= $genre ?>"
                            class="list-group-item <?= (isset($selectedGenre) && $selectedGenre == $genre) ? 'active' : '' ?>">
                            <?= $genre ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h1 class="text-center mb-4">Selamat Datang di Web Blog</h1>

                <div class="row">
                    <?php while ($row = $articles->fetch_assoc()) { ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="<?= $row['image'] ?>" class="card-img-top" alt="Gambar Artikel" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= $row['title'] ?></h5>
                                    <p class="text-muted mb-1"><small>Genre: <?= $row['genre'] ?></small></p>
                                    <p class="card-text"><?= substr($row['content'], 0, 100) ?>...</p>
                                    <a href="article_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-auto">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>