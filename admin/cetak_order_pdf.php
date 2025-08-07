<?php
require('../config.php');
require('../vendor/autoload.php');

use Dompdf\Dompdf;

if (!isset($_GET['id'])) {
    die("ID transaksi tidak ditemukan.");
}

$id = (int)$_GET['id'];

$order = $mysqli->query("SELECT o.*, u.username 
    FROM orders o 
    JOIN users u ON o.user_id = u.id 
    WHERE o.id = $id
")->fetch_assoc();

if (!$order) {
    die("Data tidak ditemukan.");
}

$html = "<h2>Detail Transaksi</h2>";
$html .= "<b>User:</b> {$order['username']}<br><b>Tanggal:</b> {$order['order_date']}<br>";
$html .= "<b>Nama:</b> {$order['buyer_name']}<br><b>Alamat:</b> {$order['buyer_address']}<br><br>";

$items = $mysqli->query("
    SELECT oi.*, p.name 
    FROM order_items oi 
    JOIN products p ON oi.product_id = p.id 
    WHERE oi.order_id = $id
");

$html .= "<table border='1' cellspacing='0' cellpadding='5'>
<tr><th>Nama Produk</th><th>Harga</th><th>Qty</th><th>Subtotal</th></tr>";
$total = 0;
while ($item = $items->fetch_assoc()) {
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
    $html .= "<tr>
        <td>{$item['name']}</td>
        <td>Rp " . number_format($item['price'], 0, ',', '.') . "</td>
        <td>{$item['quantity']}</td>
        <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
    </tr>";
}
$html .= "<tr><td colspan='3'><b>Total</b></td><td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td></tr>";
$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("transaksi_{$id}.pdf", array("Attachment" => 0));
