<?php
include '../controllers/auth.php';
require_login();
require_admin();
include '../controllers/article.php';

$data = get_article($_GET['id']);
?>

<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Artikel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="articles.php">Artikel</a></li>
            <li class="breadcrumb-item active">Detail Artikel</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <h3><?= $data['title'] ?></h3>
                <div class="mb-3">
                    <strong>Genre:</strong> <?= $data['genre'] ?>
                </div>
                <div class="mb-3">
                    <strong>Konten:</strong>
                    <p><?= nl2br($data['content']) ?></p>
                </div>
                <div class="mb-3">
                    <strong>Gambar:</strong>
                </div>
                <div class="mb-3">
                    <img src="../<?= $data['image'] ?>" alt="Gambar Artikel" style="max-width: 100%; height: auto; ">
                </div>
                <div class="mb-3">
                    <strong>Dibuat pada:</strong> <?= $data['created_at'] ?>
                </div>
                <a href="article_edit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit Artikel</a>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>
