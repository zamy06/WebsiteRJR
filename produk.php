<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RJR CLOTHING</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="icon" href="foto/logo_RJR-.png">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php include 'navbar.php'; ?>

    <!-- banner -->
    <section class="banner-produk">
      <div class="tittle container">
    </section>
  
    <!-- portofolio -->
    <div class="container-fluid pt-0 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="portofolio">Tentang Produk</h2>
        <p>
          PAKAIAN RESMI RJR CLOTH DAN PRINTING MARKER
        </p>
<form method="GET" class="mb-4">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <select name="kategori" class="form-select" onchange="this.form.submit()">
        <option value="">-- Semua Kategori --</option>
        <option value="Jaket" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Jaket') ? 'selected' : '' ?>>Jaket</option>
        <option value="Kaos" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Kaos') ? 'selected' : '' ?>>Kaos</option>
        <option value="Hoodie" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Hoodie') ? 'selected' : '' ?>>Hoodie</option>
      </select>
    </div>
  </div>
</form>

        <!-- card 1 -->
        <div class="row">
  <?php
  $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
if ($kategori != '') {
  $stmt = $mysqli->prepare("SELECT * FROM products WHERE category = ? ORDER BY id DESC");
  $stmt->bind_param("s", $kategori);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $result = $mysqli->query("SELECT * FROM products ORDER BY id DESC");
}

  while ($row = $result->fetch_assoc()):
  ?>
    <div class="col-md-4 mb-4">
      <div class="card crop-img shadow-sm h-100">
        <img
          src="http://localhost/E-commerce2/foto/<?= $row['image'] ?>"
          class="card-img-top custom-img"
          alt="<?= htmlspecialchars($row['name']) ?>"
        />
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= $row['name'] ?></h5>
          <p class="card-text"><?= $row['description'] ?></p>
          <p class="text-muted fw-bold">Rp <?= number_format($row['price'], 0, ',', '.') ?></p>
          <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-primary mt-auto">Beli Sekarang</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

      </div>
    </div>
        
    <?php include 'footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>    

