<?php
session_start();
include 'config.php';

// CEK apakah user SUDAH LOGIN
if (!isset($_SESSION['user_id'])) {
    header("Location: login_user.php?redirect=checkout");
    exit;
}

// CEK apakah keranjang kosong
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Keranjang belanja kosong'); window.location='produk.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['buyer_name']) && isset($_POST['buyer_address'])) {
        $buyer_name = mysqli_real_escape_string($mysqli, $_POST['buyer_name']);
        $buyer_address = mysqli_real_escape_string($mysqli, $_POST['buyer_address']);
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Simpan ke tabel orders
        $insert = mysqli_query($mysqli, "INSERT INTO orders (user_id, buyer_name, buyer_address, order_date) VALUES (
            '$user_id',
            '$buyer_name',
            '$buyer_address',
            '$order_date'
        )");

        if ($insert) {
            $order_id = mysqli_insert_id($mysqli);

            foreach ($_SESSION['cart'] as $item) {
                $product_id = $item['id'];
                $price = $item['price'];
                $qty = $item['quantity'];

                // Simpan item pesanan
                mysqli_query($mysqli, "INSERT INTO order_items (order_id, product_id, price, quantity) VALUES (
                    '$order_id', '$product_id', '$price', '$qty'
                )");

                // Kurangi stok barang
                $mysqli->query("
                    UPDATE products 
                    SET stock = stock - $qty 
                    WHERE id = $product_id AND stock >= $qty
                ");
            }

            // Bersihkan keranjang dari session & database
            unset($_SESSION['cart']);
            $mysqli->query("DELETE FROM cart_items WHERE user_id = $user_id");

            header("Location: invoice.php?id=$order_id");
            exit;
        } else {
            echo "<script>alert('Gagal menyimpan pesanan. Silakan coba lagi.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Checkout</h2>

  <form method="POST">
    <div class="mb-3">
      <label for="buyer_name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
    </div>
    <div class="mb-3">
      <label for="buyer_address" class="form-label">Alamat Lengkap</label>
      <textarea class="form-control" id="buyer_address" name="buyer_address" rows="3" required></textarea>
    </div>

    <h4>Ringkasan Belanja</h4>
    <ul class="list-group mb-3">
      <?php
      $total = 0;
      foreach ($_SESSION['cart'] as $item):
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
      ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?= htmlspecialchars($item['name']) ?> (x<?= $item['quantity'] ?>)
        <span>Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
      </li>
      <?php endforeach; ?>
      <li class="list-group-item d-flex justify-content-between fw-bold">
        Total
        <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
      </li>
    </ul>

    <button type="submit" class="btn btn-success">Konfirmasi & Bayar</button>
    <a href="cart.php" class="btn btn-secondary">Kembali ke Keranjang</a>
  </form>
</div>
</body>
</html>
