  <?php
  include 'config.php';

  // Mulai session hanya jika belum aktif
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  // Cek apakah user sudah login
  if (!isset($_SESSION['user_id'])) {
      header("Location: login_user.php");
      exit;
  }

  // Ambil user_id dari session
  $user_id = $_SESSION['user_id'];

  // Hapus satu pesanan
  if (isset($_GET['hapus']) && is_numeric($_GET['hapus'])) {
      $hapus_id = intval($_GET['hapus']);
      $mysqli->query("DELETE FROM order_items WHERE order_id = $hapus_id");
      $mysqli->query("DELETE FROM orders WHERE id = $hapus_id");
      header("Location: riwayat.php");
      exit;
  }

  // Hapus semua pesanan milik user ini (lebih aman!)
  if (isset($_GET['hapus_semua'])) {
      $mysqli->query("DELETE FROM order_items WHERE order_id IN (SELECT id FROM orders WHERE user_id = $user_id)");
      $mysqli->query("DELETE FROM orders WHERE user_id = $user_id");
      header("Location: riwayat.php");
      exit;
  }

  // Ambil pesanan milik user
  $orders = $mysqli->query("SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC");
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <?php include 'navbar_user.php'; ?>

  <div class="container py-5">
    <h2 class="mb-4">Riwayat Pesanan</h2>

    <!-- Tombol -->
    <div class="mb-3">
      <a href="user_home.php" class="btn btn-secondary">← Kembali</a>
      <a href="riwayat.php?hapus_semua=1" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus semua riwayat pesanan?')">Hapus Semua</a>
    </div>

    <?php if ($orders->num_rows === 0): ?>
      <div class="alert alert-info">Belum ada riwayat pesanan. Silakan mulai belanja!</div>
    <?php endif; ?>

    <?php while ($order = $orders->fetch_assoc()): ?>
      <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
          <div>
            <strong>Nama:</strong> <?= htmlspecialchars($order['buyer_name']) ?> |
            <strong>Tanggal:</strong> <?= $order['order_date'] ?>
          </div>
          <a href="riwayat.php?hapus=<?= $order['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
        </div>
        <div class="card-body">
          <p><strong>Alamat:</strong> <?= nl2br(htmlspecialchars($order['buyer_address'])) ?></p>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $order_id = $order['id'];
              $items = $mysqli->query("
                SELECT oi.*, p.name 
                FROM order_items oi
                JOIN products p ON oi.product_id = p.id
                WHERE oi.order_id = $order_id
              ");

              $total = 0;
              while ($item = $items->fetch_assoc()):
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
              ?>
                <tr>
                  <td><?= htmlspecialchars($item['name']) ?></td>
                  <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                  <td><?= $item['quantity'] ?></td>
                  <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
              <?php endwhile; ?>
              <tr class="fw-bold">
                <td colspan="3" class="text-end">Total</td>
                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  </body>
  </html>
