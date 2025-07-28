<?php
session_start();
include '../config.php';

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    // Optional: cek apakah user benar-benar ada
    $check = $mysqli->query("SELECT * FROM users WHERE id = $id");
    if ($check->num_rows === 0) {
        $_SESSION['error'] = "User tidak ditemukan.";
    } else {
        $mysqli->query("DELETE FROM users WHERE id = $id");
        $_SESSION['success'] = "User berhasil dihapus.";
    }
}

header("Location: data_pengguna.php");
exit;
