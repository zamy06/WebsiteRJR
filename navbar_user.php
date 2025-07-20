<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- pastikan file utama include font awesome di <head> -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<style>
    .navbar {
        background-color: #343a40;
        padding: 15px;
        color: white;
        display: flex;
        justify-content: space-between;
    }
    .navbar a {
        color: white;
        margin-left: 15px;
        text-decoration: none;
    }
</style>

<div class="navbar">
    <div><strong>RJR CLOTH</strong></div>
    <div>
        <a href="produk.php"><i class="fas fa-store"></i> Belanja</a>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i> Keranjang</a>
        <a href="riwayat.php"><i class="fas fa-clipboard-list"></i> Riwayat</a>
        <a href="logout_user.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>
