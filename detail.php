<?php
include 'config.php';
session_start();

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);
$result = $mysqli->query("SELECT * FROM products WHERE id = $id");

if ($result->num_rows === 0) {
    echo "Produk tidak ditemukan!";
    exit;
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?> - RJR Clothing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row">
        <div class="col-md-5">
            <img src="foto/<?= $product['image'] ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($product['name']) ?>">
        </div>
        <div class="col-md-7">
            <h2><?= $product['name'] ?></h2>
            <p><?= $product['description'] ?></p>
            <h4 class="text-primary">Rp <?= number_format($product['price'], 0, ',', '.') ?></h4>

            <form action="add_to_cart.php" method="POST" class="mt-4">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <label for="qty" class="form-label">Jumlah</label>
                <input type="number" id="qty" name="quantity" value="1" min="1" class="form-control mb-3" style="width: 100px;">
                <button type="submit" class="btn btn-success">+ Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
