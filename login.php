<?php
session_start();
include 'config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'"
    );
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        header("Location: products.php");
        exit;
    } else {
        $error = "Invalid login details";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="form-box">
        <h2>Login</h2>

        <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <p class="center">
            New user? <a href="register.php">Register</a>
        </p>
    </div>
</div>

</body>
</html>
