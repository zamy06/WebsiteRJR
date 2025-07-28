<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style css -->
    <style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
}

nav {
    width: 250px;
    background-color: #343a40; /* Dark background */
    color: #ffffff; /* White text */
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    position: fixed;
    height: 100vh; /* Full height */
    overflow-y: auto; /* Scroll if content overflows */
}

nav h2 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
}

nav .mt-4 {
    margin-top: 1.5rem;
}

.nav {
    padding: 0;
    list-style: none;
}

.nav-item {
    margin-bottom: 15px;
}

.nav-link {
    color: #ffffff;
    text-decoration: none;
    font-size: 1rem;
    display: block;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-link:hover {
    background-color: #495057; /* Slightly lighter gray on hover */
}

.badge {
    font-size: 0.9rem;
    padding: 5px 10px;
    border-radius: 15px;
    color: #ffffff;
    background-color: #28a745; /* Green background for online status */
}

.bg-dark {
    background-color: #343a40;
}

.text-white {
    color: #ffffff !important;
}

.p-3 {
    padding: 1rem;
}

.vh-100 {
    height: 100vh;
}

/* css aktiv sidebar */
.nav-link.active {
    background-color:rgb(110, 110, 110); /* Blue background */
    font-weight: bold;
}

    </style>
</head>

<!-- sidebar -->
<body>
<nav class="bg-dark text-white p-3 vh-100">
      <h2>RJR CLOTH</h2>
      <div class="mt-4">
        <p><strong>Dashboard Admin </strong></p>
        <p><span class="badge bg-success">Online</span></p>
      </div>
<ul class="nav flex-column mt-4">
    <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="data_produk.php" class="nav-link text-white <?php echo basename($_SERVER['PHP_SELF']) == 'data_produk.php' ? 'active' : ''; ?>">Data Produk</a>
    </li>
    <li class="nav-item">
        <a href="riwayat_admin.php" class="nav-link text-white <?php echo basename($_SERVER['PHP_SELF']) == '../riwayat.php' ? 'active' : ''; ?>">Riwayat</a>
    </li>
    <li class="nav-item">
    <a href="data_pengguna.php" class="nav-link text-white <?php echo basename($_SERVER['PHP_SELF']) == 'data_pengguna.php' ? 'active' : ''; ?>">Data Pengguna</a>
</li>

    
    <li class="nav-item">
        <a href="report.php" class="nav-link text-white <?php echo basename($_SERVER['PHP_SELF']) == 'report.php' ? 'active' : ''; ?>">Report E-Commerce</a>
    </li>
    <li class="nav-item">
        <a href="logout.php" class="nav-link text-white">Logout</a>
    </li>
</ul>

    </nav>
</body>
</html>