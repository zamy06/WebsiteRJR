<?php
session_start();

// Hardcoded username and password for simplicity
$valid_username = "admin";
$valid_password = "12345";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
    exit;
}
?>
