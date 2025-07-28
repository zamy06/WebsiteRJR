<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Keranjang Belanja - RJR Clothing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<style>
  body {
    padding-top: 70px; /* atau 80px kalau navbarnya lebih tinggi */
  }
  
</style>

</head>
<body>

  <?php include 'navbar.php'; ?>

  <div class="container my-5">
    <h2 class="mb-4">Keranjang Saya</h2>

    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0): ?>
      <div class="alert alert-info">Keranjang masih kosong. <a href="produk.php">Belanja sekarang!</a></div>
    <?php else: ?>
      <form action="checkout.php" method="POST">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>Gambar</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $index => $item):
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;
            ?>
            <tr>
              <td><img src="foto/<?= $item['image'] ?>" width="70"></td>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
              <td><?= $item['quantity'] ?></td>
              <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
              <td>
                <a href="remove_from_cart.php?index=<?= $index ?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" class="text-end">Total:</th>
              <th colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></th>
            </tr>
          </tfoot>
        </table>

        <div class="text-end">
          <a href="produk.php" class="btn btn-secondary">Lanjut Belanja</a>
          <button type="submit" class="btn btn-success">Checkout</button>
        </div>
      </form>
    <?php endif; ?>
  </div>
<!-- Script Bootstrap supaya dropdown login berfungsi -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>
</html>
