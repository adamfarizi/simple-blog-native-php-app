<?php
session_start();
include_once __DIR__ . '/../config/db.php';

function login($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        return ['status' => false, 'message' => 'Username tidak ditemukan.'];
    }

    if (!password_verify($password, $user['password'])) {
        return ['status' => false, 'message' => 'Password salah.'];
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    return ['status' => true, 'message' => 'Login berhasil.'];
}


function logout() {
    session_destroy();
    header("Location: login.php");
    exit;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header("Location: login.php");
        exit;
    }
}

function require_admin() {
    if (!is_logged_in() || $_SESSION['role'] !== 'admin') {
        echo "Access Denied.";
        exit;
    }
}
