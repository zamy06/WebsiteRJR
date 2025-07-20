<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_username'])) {
    header("Location: login_user.php");
    exit();
}

require 'config.php';
$nama = $_SESSION['user_nama'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda Pembeli</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 30px;
        }
        h1 {
            color: #333;
        }
        .menu-link {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
        .menu-link:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<?php include 'navbar_user.php'; ?>

<div class="container">
    <h1>Hai, <?= htmlspecialchars($nama) ?> 👋</h1>
    <p>Selamat datang di toko RJR CLOTH!</p>

    <a href="produk.php" class="menu-link"><i class="fas fa-store"></i> Lihat Produk</a>
    <a href="cart.php" class="menu-link"><i class="fas fa-shopping-cart"></i> Keranjang Saya</a>
    <a href="riwayat.php" class="menu-link"><i class="fas fa-clipboard-list"></i> Riwayat Pesanan</a>
</div>

</body>
</html>
