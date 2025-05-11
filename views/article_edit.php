<?php
include '../controllers/auth.php';
require_login();
require_admin();
include '../controllers/article.php';

$data = get_article(id: $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update_article($_GET['id'], $_POST['title'], $_POST['content'], $_POST['genre'], $_FILES['image']);
    header("Location: dashboard.php");
}
?>

<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Artikel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Artikel</li>
            <li class="breadcrumb-item active">Edit Artikel</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required><?= $data['content'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" value="<?= $data['genre'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar (opsional)</label><br>
                        <img src="../<?= $data['image'] ?>" alt="Preview" style="width: 120px; margin-bottom: 10px;"><br>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>
