<?php
session_start();
include '../config.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $mysqli->query("DELETE FROM admin WHERE id = $id");
    $_SESSION['success'] = "Admin berhasil dihapus.";
}

header("Location: data_pengguna.php");
exit;
