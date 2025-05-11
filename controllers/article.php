<?php
include_once __DIR__ . '/../config/db.php';

function get_articles()
{
    global $conn;
    return $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
}

function get_article($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function get_articles_by_genre($genre) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM articles WHERE genre = ?");
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    return $stmt->get_result();
}

function upload_image($file, $title, $genre)
{
    $targetDir = "../uploads/";
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $cleanTitle = strtolower(preg_replace("/[^a-z0-9]+/", "-", $title));
    $cleanGenre = strtolower(preg_replace("/[^a-z0-9]+/", "-", $genre));
    $fileName = $cleanTitle . "-" . $cleanGenre . "." . $ext;
    $targetFile = $targetDir . uniqid() . "-" . $fileName;

    if (!getimagesize($file["tmp_name"])) return false;

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return str_replace("../", "", $targetFile);
    }
    return false;
}


function add_article($title, $content, $genre, $imageFile)
{
    global $conn;
    $imagePath = upload_image($imageFile, $title, $genre);
    if (!$imagePath) return false;

    $stmt = $conn->prepare("INSERT INTO articles (title, content, genre, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $title, $content, $genre, $imagePath);
    return $stmt->execute();
}

function update_article($id, $title, $content, $genre, $imageFile = null)
{
    global $conn;

    $oldData = get_article($id);
    $imagePath = $oldData['image'];

    if ($imageFile && $imageFile['error'] === 0) {
        // Hapus gambar lama
        if (file_exists("../" . $oldData['image'])) {
            unlink("../" . $oldData['image']);
        }
        $imagePath = upload_image($imageFile, $title, $genre);
        if (!$imagePath) return false;
    }

    $stmt = $conn->prepare("UPDATE articles SET title=?, content=?, genre=?, image=? WHERE id=?");
    $stmt->bind_param('ssssi', $title, $content, $genre, $imagePath, $id);
    return $stmt->execute();
}

function delete_article($id)
{
    global $conn;
    $article = get_article($id);

    if (file_exists("../" . $article['image'])) {
        unlink("../" . $article['image']);
    }

    $stmt = $conn->prepare("DELETE FROM articles WHERE id=?");
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}
