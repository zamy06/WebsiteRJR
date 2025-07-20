<?php
session_start();
include 'config.php'; // tambahkan ini biar bisa akses $mysqli

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Pastikan index valid
    if (isset($_SESSION['cart'][$index])) {
        // Simpan product_id sebelum dihapus
        $product_id = $_SESSION['cart'][$index]['id'];

        // Hapus dari session cart
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // reset index array

        // ✅ Hapus juga dari database jika user login
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $mysqli->query("DELETE FROM cart_items WHERE user_id = $user_id AND product_id = $product_id");
        }
    }
}

header("Location: cart.php");
exit;
