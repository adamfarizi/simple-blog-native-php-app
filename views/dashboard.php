<?php
include '../controllers/auth.php';
require_login();
include '../controllers/article.php';
$data = get_articles();

if (isset($_GET['delete'])) {
    delete_article($_GET['delete']);
    header("Location: dashboard.php");
    exit;
}
?>

<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Artikel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fas fa-table me-1"></i>Artikel</div>
                <a href="article_add.php" class="btn btn-primary btn-sm">+ Tambah Artikel</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tittle</th>
                            <th>Content</th>
                            <th>Genre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($row = $data->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <p>
                                        <?= $no++ ?>
                                    </p>
                                </td>
                                <td>
                                    <div
                                        style="max-width: 150px; min-width: 100px;">
                                        <?= $row['title'] ?>
                                    </div>
                                </td>
                                <td>
                                    <div
                                        style="max-width: 150px; min-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        <?= $row['content'] ?>
                                    </div>
                                </td>
                                <td><?= $row['genre'] ?></td>
                                <td>
                                    <a href="article_info.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary" style="width: 30px;"><i class="fa-solid fa-circle-info"></i></i></a>
                                    <a href="article_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning" style="width: 30px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus produk ini?')" style="width: 30px"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>