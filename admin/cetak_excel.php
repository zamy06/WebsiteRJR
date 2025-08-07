<?php
require('../config.php');

// Set header agar browser mendeteksi sebagai file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=riwayat_transaksi.xls");

// Mulai cetak tabel
echo "<table border='1'>
<tr style='background-color:#ddd; font-weight:bold;'>
    <th>Username</th>
    <th>Nama Pembeli</th>
    <th>Alamat</th>
    <th>Tanggal</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
</tr>";

$orders = $mysqli->query("SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.order_date DESC");

while ($order = $orders->fetch_assoc()) {
    $items = $mysqli->query("
        SELECT oi.*, p.name 
        FROM order_items oi 
        JOIN products p ON oi.product_id = p.id 
        WHERE oi.order_id = {$order['id']}
    ");
    
    while ($item = $items->fetch_assoc()) {
        $subtotal = $item['price'] * $item['quantity'];
        echo "<tr>
            <td>{$order['username']}</td>
            <td>{$order['buyer_name']}</td>
            <td>{$order['buyer_address']}</td>
            <td>{$order['order_date']}</td>
            <td>{$item['name']}</td>
            <td>{$item['price']}</td>
            <td>{$item['quantity']}</td>
            <td>{$subtotal}</td>
        </tr>";
    }
}

echo "</table>";
exit;
