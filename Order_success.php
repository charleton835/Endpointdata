<?php
session_start();
if (!isset($_GET['order_id'])) {
    header("Location: ../pages/cart.php");
    exit();
}
$orderId = htmlspecialchars($_GET['order_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../css/order_success.css">
</head>
<body>
    <h2>Thank you for your purchase!</h2>
    <p>Your Order ID: <strong><?php echo $orderId; ?></strong></p>
    <a href="Products.php">Return to The Products Page</a>
</body>
</html>
