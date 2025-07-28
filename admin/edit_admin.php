<?php
session_start();
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $username = $mysqli->real_escape_string(trim($_POST['username']));
    $password = $_POST['password'];
$email = $mysqli->real_escape_string(trim($_POST['email']));

if (!empty($password)) {
    $hashed = md5($password);
    $mysqli->query("UPDATE admin SET username = '$username', email = '$email', password = '$hashed' WHERE id = $id");
} else {
    $mysqli->query("UPDATE admin SET username = '$username', email = '$email' WHERE id = $id");
}


    $_SESSION['success'] = "Data admin berhasil diubah.";
}

header("Location: data_pengguna.php");
exit;
