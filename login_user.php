<?php
session_start();
require 'config.php';

$success = '';
$error = '';

if (isset($_SESSION['user_username'])) {
    header("Location: user_home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['user_username'] = $data['username'];
    $_SESSION['user_nama'] = $data['nama_lengkap'];

    // Kalau ada redirect, arahkan ke situ
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] . ".php" : 'user_home.php';
    header("Location: $redirect");
    // Ambil kembali isi keranjang dari database
$_SESSION['cart'] = [];
$user_id = $_SESSION['user_id'];
$result = $mysqli->query("
    SELECT c.product_id, c.quantity, p.name, p.price, p.image
    FROM cart_items c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = $user_id
");

while ($row = $result->fetch_assoc()) {
    $_SESSION['cart'][] = [
        'id' => $row['product_id'],
        'name' => $row['name'],
        'price' => $row['price'],
        'image' => $row['image'],
        'quantity' => $row['quantity']
    ];
}

    exit;
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Pembeli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            width: 350px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login Pembeli</h2>

        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php elseif ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p style="margin-top: 10px;">Belum punya akun? <a href="register_user.php">Daftar di sini</a></p>
        <button onclick="window.location.href='home.php'">Kembali ke Beranda</button>
    </div>
</body>
</html>
