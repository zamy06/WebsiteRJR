<?php
session_start(); 
require 'config.php';

if (isset($_SESSION['username'])) {
    header("Location:dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['get_username'];
    $password = md5($_POST['get_password']); // Hashing password dengan MD5

    // Query menggunakan prepared statement
    $stmt = $mysqli->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
// var_dump($result->num_rows);
// exit(
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: admin/dashboard.php");
    } else {
        $error = "Username atau password salah.";
    }
    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="foto/logo_RJR-.png">
    <title>Login</title>
   
    <style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background : url("foto/gambar\ depan\ toko\ .jpg") no-repeat center center ;
    background-size: cover;

    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

.login-container {
    background: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi 80% */
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    text-align: center;
}


h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 14px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px 15px;
    background-color: #555;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #333;
}

.register-link {
    margin-top: 15px;
    font-size: 14px;
}

.register-link a {
    color: #6b73ff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

    </style>

</head>
<body>

<!-- style jarak button lgin & back -->
<style>
.login-button {
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.back-button {
    margin-top: 15px; /* jarak antara login dan back */
    padding: 8px 16px;
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-button:hover {
    background-color: #0056b3;
}

.back-button:hover {
    background-color: #5a6268;
}
</style>


   <div class="login-container">
    <img src="foto/logo_RJR-.png" width="100" height="100">
    <h1>RJR CLOTH</h1>
    <p>Silahkan Login</p>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login_admin.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="get_username" placeholder=" Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="get_password" placeholder="Password" required>
        </div>
        
        <button type="submit" class="login-button">Login</button>
    </form>

    <!-- Tombol Back -->
    <button type="button" class="back-button" onclick="window.location.href='home.php'">Back to Home</button>
</div>


</body>
</html>


  

