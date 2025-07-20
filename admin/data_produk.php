<?php
include '../config.php';
include("../sidebar.php");

// Proses simpan/update produk
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if ($image != "") {
        move_uploaded_file($_FILES['image']['tmp_name'], "../foto/" . $image);
    }

    if ($id) { // Update produk
        $sql = "UPDATE products SET name='$name', price='$price', description='$description'";
        if ($image != "") {
            $sql .= ", image='$image'";
        }
        $sql .= " WHERE id=$id";
    } else { // Insert produk baru
        $sql = "INSERT INTO products (name, price, description, image) VALUES ('$name', '$price', '$description', '$image')";
    }

    $mysqli->query($sql);
    header("Location: produk.php");
    exit;
}

// Proses hapus produk
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = $mysqli->query("SELECT image FROM products WHERE id=$id");
    if ($result && $row = $result->fetch_assoc()) {
        $file = "../foto/" . $row['image'];
        if (file_exists($file)) unlink($file);
    }
    $mysqli->query("DELETE FROM products WHERE id=$id");
    header("Location: produk.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - CRUD Produk</title>
    <!-- ✅ Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-5" style="margin-left: 250px;">
    <h2 class="text-center mb-4">Manajemen Produk</h2>

    <!-- Form Tambah/Edit -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="proses_produk.php" method="POST" enctype="multipart/form-data" class="row g-3">
                <input type="hidden" name="id" id="id">
                <div class="col-md-6">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Produk" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="price" id="price" class="form-control" placeholder="Harga" required>
                </div>
                <div class="col-md-12">
                    <textarea name="description" id="description" class="form-control" placeholder="Deskripsi Produk"></textarea>
                </div>
                <div class="col-md-6">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" name="save" class="btn btn-primary">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Produk -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $no = 1; // inisialisasi nomor urut mulai dari 1
    $result = $mysqli->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $no++ ?></td> <!-- nomor urut otomatis naik -->
        <td><?= $row['name'] ?></td>
        <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
        <td><?= $row['description'] ?></td>
        <td><img src="../foto/<?= $row['image'] ?>" width="100" class="img-thumbnail"></td>
        <td>
            <button class="btn btn-warning btn-sm mb-1"
                onclick="openModal(
                    '<?= $row['id'] ?>',
                    `<?= addslashes($row['name']) ?>`,
                    <?= $row['price'] ?>,
                    `<?= addslashes($row['description']) ?>`
                )">Edit</button>

            <form method="POST" action="proses_produk.php" style="display:inline;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" name="delete" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</tbody>

        </table>
    </div>
</div>

<!-- Modal Form Produk -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="proses_produk.php" method="POST" enctype="multipart/form-data" class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Tambah Produk</h5>
       
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="modal-id">
        <div class="mb-3">
            <label for="modal-name" class="form-label">Nama Produk</label>
            <input type="text" name="name" id="modal-name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="modal-price" class="form-label">Harga</label>
            <input type="number" name="price" id="modal-price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="modal-description" class="form-label">Deskripsi</label>
            <textarea name="description" id="modal-description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="modal-image" class="form-label">Gambar</label>
            <input type="file" name="image" id="modal-image" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
      </div>
      <div class="modal-footer">
        
  <!-- Tombol Batal: hanya tutup modal, tidak redirect -->
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

  <!-- Tombol Simpan -->
  <button type="submit" name="save" class="btn btn-primary">Simpan</button>
</div>

    </form>
  </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="proses_produk.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
        <input type="hidden" name="id" id="delete-id">
      </div>

      <div class="modal-footer">
        <!-- Tombol Batal menutup modal -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
       <!-- Tombol untuk memunculkan modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
  Hapus Produk
</button>

      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function openModal(id = '', name = '', price = '', description = '') {
    document.getElementById('modal-id').value = id;
    document.getElementById('modal-name').value = name;
    document.getElementById('modal-price').value = price;
    document.getElementById('modal-description').value = description;
    document.getElementById('modal-image').value = ''; // Kosongkan file input

    // Ganti judul modal sesuai mode
    document.getElementById('productModalLabel').textContent = id ? 'Edit Produk' : 'Tambah Produk';

    // Tampilkan modal
    var modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
}

function confirmDelete(id) {
    document.getElementById('delete-id').value = id;
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

function resetForm() {
    openModal(); // kosongkan form
}
</script>

</body>
<!-- Bootstrap 5 Bundle dengan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>