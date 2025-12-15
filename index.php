<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: products.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container center">
    <h1>E-Commerce Website</h1>
    <p>Please login or register to continue</p>
    <a href="login.php">Login</a> |
    <a href="register.php">Register</a>
</div>

</body>
</html>
