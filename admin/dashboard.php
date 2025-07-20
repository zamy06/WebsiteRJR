<?php
include("../config.php");
include("../sidebar.php");
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
  <!-- Sidebar Admin -->
<div class="d-flex">
  <!-- Sidebar -->
  <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
    <h4 class="text-center mb-4">Admin RJR Cloth</h4>
    
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="dashboard.php">📊 Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="data_produk.php">📦 Data Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="kategori.php">📁 Kategori Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="transaksi.php">🧾 Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="pelanggan.php">👥 Data Pelanggan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="laporan.php">📈 Laporan Penjualan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="admin.php">🧑‍💼 Data Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="pengaturan.php">⚙️ Pengaturan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php" onclick="return confirm('Yakin ingin logout?')">🚪 Logout</a>
      </li>
    </ul>
  </div>

  <!-- Main Content (sample) -->
  <div class="p-4" style="flex: 1;">
    <h1>Selamat Datang Admin!</h1>
    <p>Silakan pilih menu dari sidebar.</p>
  </div>
</div>


       

