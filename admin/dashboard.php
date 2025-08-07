<?php
include("../config.php");
include("../sidebar.php");

// Hitung total produk
$total_produk = $mysqli->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];

// Hitung total user
$total_user = $mysqli->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];

// Hitung total transaksi
$total_transaksi = $mysqli->query("SELECT COUNT(*) as total FROM orders")->fetch_assoc()['total'];

// Hitung total admin
$total_admin = $mysqli->query("SELECT COUNT(*) as total FROM admin")->fetch_assoc()['total'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <style>
   body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex; /* Flexbox layout untuk body */
}
.main-content {
    margin-left: 250px; /* Berikan margin sesuai lebar sidebar */
    flex-grow: 1; /* Membuat konten utama mengisi ruang yang tersisa */
    padding: 20px; /* Ruang di dalam konten utama */
    background-color: #f8f9fa; /* Warna latar belakang terang */
}
header {
    background-color: #007bff; /* Warna biru header */
    color: #ffffff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
  </style>


</head>
<body>
    <!-- Main Content -->
<div class="main-content">
  <h1 class="mb-4">Selamat Datang Admin!</h1>
  <div class="row">

    <!-- Card: Total Produk -->
<div class="col-md-3">
  <div class="card text-white bg-primary mb-3">
    <div class="card-body">
      <h5 class="card-title">📦 Total Produk</h5>
      <p class="card-text fs-4"><?= $total_produk ?></p>
      <a href="data_produk.php" class="btn btn-light btn-sm">Lihat Detail</a>
    </div>
  </div>
</div>

<!-- Card: Total User -->
<div class="col-md-3">
  <div class="card text-white bg-success mb-3">
    <div class="card-body">
      <h5 class="card-title">👥 Total User</h5>
      <p class="card-text fs-4"><?= $total_user ?></p>
      <a href="data_pengguna.php" class="btn btn-light btn-sm">Lihat Detail</a>
    </div>
  </div>
</div>

<!-- Card: Total Transaksi -->
<div class="col-md-3">
  <div class="card text-white bg-warning mb-3">
    <div class="card-body">
      <h5 class="card-title">🧾 Total Transaksi</h5>
      <p class="card-text fs-4"><?= $total_transaksi ?></p>
      <a href="riwayat_admin.php" class="btn btn-light btn-sm">Lihat Detail</a>
    </div>
  </div>
</div>

<!-- Card: Total Admin -->
<div class="col-md-3">
  <div class="card text-white bg-danger mb-3">
    <div class="card-body">
      <h5 class="card-title">🧑‍💼 Total Admin</h5>
      <p class="card-text fs-4"><?= $total_admin ?></p>
      <a href="data_pengguna.php" class="btn btn-light btn-sm">Lihat Detail</a>
    </div>
  </div>
</div>

  </div>
  </div>
</div>

</div>


       

