<?php
session_start();
include 'config.php';

// Ambil data dari form
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// Validasi awal
if ($product_id < 1 || $quantity < 1) {
    header("Location: produk.php");
    exit;
}

// Ambil data produk dari database
$result = $mysqli->query("SELECT * FROM products WHERE id = $product_id");
if ($result->num_rows === 0) {
    header("Location: produk.php");
    exit;
}
$product = $result->fetch_assoc();

// Hitung jumlah yang sudah ada di session cart
$existingQty = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        if ($cartItem['id'] == $product_id) {
            $existingQty = $cartItem['quantity'];
            break;
        }
    }
}

// Cek apakah total quantity melebihi stok
$totalRequested = $existingQty + $quantity;
if ($totalRequested > $product['stock']) {
    header("Location: detail.php?id=$product_id&error=stok_kurang&tersedia={$product['stock']}");
    exit;
}

// Buat array item keranjang
$item = [
    'id' => $product['id'],
    'name' => $product['name'],
    'price' => $product['price'],
    'image' => $product['image'],
    'quantity' => $quantity
];

// Simpan ke dalam session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Jika produk sudah ada, tambahkan jumlahnya
$found = false;
foreach ($_SESSION['cart'] as &$cartItem) {
    if ($cartItem['id'] == $item['id']) {
        $cartItem['quantity'] += $item['quantity'];
        $found = true;
        break;
    }
}
unset($cartItem);

if (!$found) {
    $_SESSION['cart'][] = $item;
}

// Simpan ke database jika login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $cek = $mysqli->query("SELECT * FROM cart_items WHERE user_id = $user_id AND product_id = $product_id");
    if ($cek->num_rows > 0) {
        $mysqli->query("UPDATE cart_items SET quantity = quantity + $quantity WHERE user_id = $user_id AND product_id = $product_id");
    } else {
        $mysqli->query("INSERT INTO cart_items (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)");
    }
}

// Redirect ke halaman keranjang
header("Location: cart.php");
exit;
