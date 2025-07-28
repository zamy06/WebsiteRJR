<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config.php';

if (isset($_POST['save'])) {
    $id = $_POST['id']; // kosong kalau tambah, ada isi kalau edit
    $name = $mysqli->real_escape_string(trim($_POST['name']));
    $price = (int) $_POST['price'];
    $description = $mysqli->real_escape_string(trim($_POST['description']));
    $stock = (int) $_POST['stock'];

    // Proses upload gambar jika ada file baru
    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../foto/";
        $image = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $image;

        // Cek apakah file gambar valid (opsional, bisa ditambah validasi ekstensi dll)
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileType, $allowedTypes)) {
            die("Tipe file gambar tidak diperbolehkan.");
        }

        // Upload file gambar
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            die("Gagal upload gambar.");
        }
    }

    if ($id) {
        // Edit produk
       $sql = "UPDATE products SET name='$name', price=$price, description='$description', stock=$stock";


        if ($image != "") {
            // Update gambar jika ada upload baru
            $sql .= ", image='$image'";
        }

        $sql .= " WHERE id=$id";

        if (!$mysqli->query($sql)) {
            die("Error update produk: " . $mysqli->error);
        }
    } else {
        // Tambah produk baru
        // Jika gambar tidak diupload, simpan null atau kosong sesuai kebutuhan
        $imgValue = ($image != "") ? "'$image'" : "NULL";

        $sql = "INSERT INTO products (name, price, description, image, stock) 
        VALUES ('$name', $price, '$description', $imgValue, $stock)";


        if (!$mysqli->query($sql)) {
            die("Error tambah produk: " . $mysqli->error);
        }
    }
session_start();
$_SESSION['success'] = $id ? "Produk berhasil diperbarui." : "Produk berhasil ditambahkan.";
header("Location: data_produk.php");
exit;

}

// Proses hapus produk
if (isset($_POST['delete'])) {
    $id = (int) $_POST['id'];

    // Optional: Hapus file gambar juga kalau ada
    $result = $mysqli->query("SELECT image FROM products WHERE id=$id");
    if ($result) {
        $row = $result->fetch_assoc();
        if ($row && !empty($row['image'])) {
            $filePath = "foto/" . $row['image'];
            if (file_exists($filePath)) {
                unlink($filePath); // hapus file gambar
            }
        }
    }

    $mysqli->query("DELETE FROM products WHERE id=$id");
    header("Location: ../produk.php");
    exit;
}
?>
