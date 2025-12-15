<?php
session_start();
include 'config/db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
    $_SESSION['cart'][] = $_GET['id'];
}

if (count($_SESSION['cart']) == 0) {
    echo "Cart empty <br><a href='products.php'>Go back</a>";
    exit;
}

$ids = implode(',', $_SESSION['cart']);
$result = mysqli_query($conn,
    "SELECT * FROM products WHERE id IN ($ids)"
);

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <div>Your Cart</div>
    <div>
        <a href="products.php">Products</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="cart-item">
            <span><?php echo $row['name']; ?></span>
            <span>₹<?php echo $row['price']; ?></span>
        </div>
        <?php $total += $row['price']; ?>
    <?php } ?>

    <div class="total">Total: ₹<?php echo $total; ?></div>
</div>

</body>
</html>
