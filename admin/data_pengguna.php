<?php
session_start();
include '../config.php';
include '../sidebar.php';

// Ambil semua data user
$users = $mysqli->query("SELECT * FROM users");

// Ambil semua data admin
$admins = $mysqli->query("SELECT * FROM admin");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Data Pengguna - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5" style="margin-left: 250px;">

  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
  <?php endif; ?>

  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
  <?php endif; ?>

  <h2 class="mb-4">Data Pengguna</h2>

  <!-- Tab Navigation -->
  <ul class="nav nav-tabs mb-3" id="userTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#admins">Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#users">User</a>
    </li>
  </ul>

  <div class="tab-content">

    <!-- Tab: Admin -->
    <div class="tab-pane fade show active" id="admins">
      <!-- Form Tambah Admin -->
      <div class="card mb-4">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0">Tambah Admin Baru</h5>
        </div>
        <div class="card-body">
          <form action="tambah_admin.php" method="POST" class="row g-3">
            <div class="col-md-4">
              <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="col-md-4">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-md-4">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-success w-100">Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Tabel Admin -->
      <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
          <h5 class="mb-0">Daftar Admin</h5>
        </div>
        <div class="card-body table-responsive">
          <?php if ($admins->num_rows > 0): ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($admin = $admins->fetch_assoc()): ?>
                  <tr>
                    <td><?= $admin['id'] ?></td>
                    <td><?= htmlspecialchars($admin['username']) ?></td>
                    <td><?= htmlspecialchars($admin['email'] ?? '-') ?></td>
                    <td>
                      <!-- Tombol Edit -->
                      <button class="btn btn-warning btn-sm"
                        onclick="editAdmin('<?= $admin['id'] ?>', '<?= $admin['username'] ?>', '<?= $admin['email'] ?>')">
                        Edit
                      </button>

                      <!-- Tombol Hapus -->
                      <form method="POST" action="hapus_admin.php" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                        <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-warning">Tidak ada admin ditemukan.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Tab: User -->
    <div class="tab-pane fade" id="users">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Daftar User</h5>
        </div>
        <div class="card-body table-responsive">
          <?php if ($users->num_rows > 0): ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Aksi</th> <!-- Tambahkan ini -->
                </tr>
                </thead>
              <tbody>
                <?php while ($user = $users->fetch_assoc()): ?>
                  <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['nama_lengkap']) ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? '-') ?></td>
                    <td>
  <form method="POST" action="hapus_user.php" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
  </form>
</td>

                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-warning">Tidak ada user ditemukan.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div> <!-- tab-content -->
</div> <!-- container -->

<!-- Modal Edit Admin -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="edit_admin.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAdminLabel">Edit Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="edit-id">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" id="edit-username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" id="edit-email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password Baru (opsional)</label>
          <input type="password" name="password" class="form-control">
          <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
<script>
function editAdmin(id, username, email) {
  document.getElementById('edit-id').value = id;
  document.getElementById('edit-username').value = username;
  document.getElementById('edit-email').value = email;
  var modal = new bootstrap.Modal(document.getElementById('editAdminModal'));
  modal.show();
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
