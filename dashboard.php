<?php
include("config.php");
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
  font-family: Arial, sans-serif;
}

nav {
  width: 250px;
}

.card {
  border: none;
}

  </style>

</head>
<body>
  <!-- Sidebar -->
  <div class="d-flex">
    <nav class="bg-dark text-white p-3 vh-100">
      <h2>RJR CLOTH</h2>
      <div class="mt-4">
        <p><strong>Dashboard Admin </strong></p>
        <p><span class="badge bg-success">Online</span></p>
      </div>
      <ul class="nav flex-column mt-4">
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Settings</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Produk</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Report E-Commerce</a>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow-1">
      <header class="d-flex justify-content-between align-items-center p-3 bg-primary text-white">
        <h3>Dashboard Admin </h3>
        <p>Admin</p>
      </header>
      <main class="p-4">

              <!-- Welcome Message -->
              <div class="alert alert-warning">
          <strong>Selamat Datang di Admin RJR CLOTH</strong>
          <p>Halaman ini hanya bisa diakses oleh administrator.</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="row">
          <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body text-center">
                <h2>4</h2>
                <p>Total Produk</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body text-center">
                <h2>2</h2>
                <p>Total Customer</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body text-center">
                <h2>2</h2>
                <p>Pesanan</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
              <div class="card-body text-center">
                <h2>3</h2>
                <p>Jumlah Pengguna</p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

       

