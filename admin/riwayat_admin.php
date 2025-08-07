<?php
session_start();
include '../config.php';
include("../sidebar.php");

// Ambil parameter pencarian
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Default limit dan halaman
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Query pencarian
$search_sql = $search ? "WHERE o.buyer_name LIKE '%$search%' OR u.username LIKE '%$search%'" : "";

// Total data untuk pagination
$total_orders_result = $mysqli->query("
  SELECT COUNT(*) as total 
  FROM orders o
  JOIN users u ON o.user_id = u.id
  $search_sql
");
$total_orders = $total_orders_result->fetch_assoc()['total'];
$total_pages = ceil($total_orders / $limit);

// Ambil data orders sesuai limit dan offset
$orders = $mysqli->query("
  SELECT o.*, u.username 
  FROM orders o 
  JOIN users u ON o.user_id = u.id 
  $search_sql
  ORDER BY o.order_date DESC 
  LIMIT $limit OFFSET $offset
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Semua Pesanan - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5" style="margin-left: 250px;">
  <h2 class="mb-4">Riwayat Pembelian Semua User</h2>
<a href="cetak_pdf.php" class="btn btn-danger mb-3">Cetak Semua PDF</a>
<a href="cetak_excel.php" class="btn btn-success mb-3">Cetak Semua Excel</a>

  <!-- Form Show Entries -->
  <form method="get" class="mb-3">
    <label for="limit">Tampilkan:</label>
    <select name="limit" id="limit" onchange="this.form.submit()">
      <?php foreach ([5, 10, 15, 20] as $val): ?>
        <option value="<?= $val ?>" <?= $val == $limit ? 'selected' : '' ?>><?= $val ?></option>
      <?php endforeach; ?>
    </select> data per halaman
    <input type="hidden" name="page" value="1">
  </form>
<!-- Form Pencarian -->
<form method="get" class="mb-3 d-flex align-items-center">
  <input type="text" name="search" class="form-control me-2" placeholder="Cari nama pembeli..." value="<?= htmlspecialchars($search) ?>" />
  
  <input type="hidden" name="limit" value="<?= $limit ?>">
  <button type="submit" class="btn btn-primary">Cari</button>
</form>

  <?php if ($orders->num_rows === 0): ?>
    <div class="alert alert-info">Belum ada transaksi yang dilakukan pengguna.</div>
  <?php endif; ?>

  <?php while ($order = $orders->fetch_assoc()): ?>
    <div class="card mb-4">
      
      <div class="card-header bg-dark text-white">
        <strong>Akun:</strong> <?= htmlspecialchars($order['username']) ?> |
        <strong>Tanggal:</strong> <?= $order['order_date'] ?>
        <a href="cetak_order_pdf.php?id=<?= $order['id'] ?>" class="btn btn-outline-primary btn-sm float-end">Cetak PDF</a>
      </div>
      <div class="card-body">
        <p><strong>Nama Pembeli:</strong> <?= htmlspecialchars($order['buyer_name']) ?></p>
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

  <!-- Pagination -->
<nav>
  <ul class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>&search=<?= urlencode($search) ?>">
          <?= $i ?>
        </a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>


</div>

</body>
</html>
