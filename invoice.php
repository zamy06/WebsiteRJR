<?php
include 'config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login_user.php");
    exit;
}

// Ambil ID pesanan dari URL
if (!isset($_GET['id'])) {
    echo "ID pesanan tidak ditemukan.";
    exit;
}

$order_id = intval($_GET['id']);

// Ambil data pesanan
$query = mysqli_query($mysqli, "SELECT * FROM orders WHERE id = '$order_id'");
$order = mysqli_fetch_assoc($query);

if (!$order) {
    echo "Pesanan tidak ditemukan.";
    exit;
}

// Ambil detail item pesanan
$item_query = mysqli_query($mysqli, "
    SELECT oi.*, p.name AS product_name
    FROM order_items oi
    JOIN products p ON oi.product_id = p.id
    WHERE oi.order_id = '$order_id'
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Invoice #<?= $order['id'] ?></h2>
  <p><strong>Nama Pembeli:</strong> <?= htmlspecialchars($order['buyer_name']) ?></p>
  <p><strong>Alamat:</strong> <?= htmlspecialchars($order['buyer_address']) ?></p>
  <p><strong>Tanggal Pesanan:</strong> <?= $order['order_date'] ?></p>

  <h4 class="mt-4">Detail Produk</h4>
  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $grand_total = 0;
      while ($item = mysqli_fetch_assoc($item_query)):
          $subtotal = $item['price'] * $item['quantity'];
          $grand_total += $subtotal;
      ?>
      <tr>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
        <td><?= $item['quantity'] ?></td>
        <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
      </tr>
      <?php endwhile; ?>
      <tr>
        <th colspan="3" class="text-end">Total</th>
        <th>Rp <?= number_format($grand_total, 0, ',', '.') ?></th>
      </tr>
    </tbody>
  </table>

  <a href="produk.php" class="btn btn-primary">Kembali ke Belanja</a>
</div>
</body>
</html>
