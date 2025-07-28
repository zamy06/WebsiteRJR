<?php
session_start();
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $mysqli->real_escape_string(trim($_POST['username']));
$email = $mysqli->real_escape_string(trim($_POST['email']));
$password = md5($_POST['password']);

$check = $mysqli->query("SELECT * FROM admin WHERE username = '$username'");
if ($check->num_rows > 0) {
    $_SESSION['error'] = "Username admin sudah digunakan!";
} else {
    $mysqli->query("INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')");
    $_SESSION['success'] = "Admin baru berhasil ditambahkan!";
}

}

header("Location: data_pengguna.php");
exit;
