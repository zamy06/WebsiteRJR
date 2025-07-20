<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Tambahkan link CSS Font Awesome di halaman yang include navbar ini -->
<!-- Biasanya di <head> file utama -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent shadow-lg fixed-top">
  <div class="container">
    <img src="foto/logo_RJR-.png" width="30" height="30" alt="logo">
    <a class="navbar-brand fw-bold" href="home.php">RJR CLOTHING</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-right" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- HOME -->
        <li class="nav-item">
          <a class="nav-link" href="home.php">
            <i class="fas fa-home me-1"></i> Home
          </a>
        </li>

        <!-- PRODUK -->
        <li class="nav-item">
          <a class="nav-link" href="produk.php">
            <i class="fas fa-tshirt me-1"></i> Produk
          </a>
        </li>

        <!-- TENTANG -->
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">
            <i class="fas fa-info-circle me-1"></i> Tentang
          </a>
        </li>

        <!-- KERANJANG -->
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fas fa-shopping-cart me-1"></i> Keranjang
          </a>
        </li>

        <!-- CEK LOGIN -->
        <?php if (isset($_SESSION['user_id'])): ?>
  <!-- USER LOGGED IN -->
  <li class="nav-item">
    <a class="nav-link" href="user_home.php">
      <i class="fas fa-user-circle me-1"></i> Akun Saya (<?= htmlspecialchars($_SESSION['user_nama']) ?>)
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout_user.php">
      <i class="fas fa-sign-out-alt me-1"></i> Logout
    </a>
  </li>
        <?php else: ?>
          <!-- DROPDOWN LOGIN -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-sign-in-alt me-1"></i> Login
            </a>
            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
              <li><a class="dropdown-item" href="login_user.php"><i class="fas fa-user me-1"></i> Login User</a></li>
              <li><a class="dropdown-item" href="login_admin.php"><i class="fas fa-user-shield me-1"></i> Login Admin</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
