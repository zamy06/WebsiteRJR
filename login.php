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
// exit();
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
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
    background: linear-gradient(135deg, #6b73ff, #000dff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

.login-container {
    background: #fff;
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
    background-color: #6b73ff;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #000dff;
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

    <div class="login-container">
        <h1>Login</h1>
        <p>RJR CLOTH</p>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="get_username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="get_password" placeholder="Enter your password" required>
            </div>
            <button href="dashboard.php" type="submit">Login</button>
            <p class="register-link">Don't have an account? <a href="dashboard.php">Register</a></p>
        </form>
    </div>
</body>
</html>


  

