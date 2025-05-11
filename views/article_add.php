<?php
include '../controllers/auth.php';
require_login();
require_admin();
include '../controllers/article.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        add_article($_POST['title'], $_POST['content'], $_POST['genre'], $_FILES['image']);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Upload gambar gagal atau tidak ada gambar yang dipilih.";
    }
}
?>
<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Artikel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Artikel</li>
            <li class="breadcrumb-item active">Tambah Artikel</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre" name="genre" required>
                            <option value="">-- Pilih Genre --</option>
                            <option value="Teknologi">Teknologi</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Bisnis">Bisnis</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php' ?>