<?php
session_start();
require_once dirname(__DIR__) . '/server/database.php';

$orderId = $_GET['order_id'] ?? null;

if (!$orderId) {
    header("Location: cart.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->execute([$orderId]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->execute([$orderId]);
    $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching order details: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../css/Confirmation.css">
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your purchase! Your order has been successfully placed.</p>
        
        <h2>Order Details</h2>
        <div class="order-details">
            <div class="order-summary">
                <div class="summary-item">
                    <span>Order ID:</span>
                    <span><?= $order['id'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Name:</span>
                    <span><?= $order['name'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Email:</span>
                    <span><?= $order['email'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Address:</span>
                    <span><?= $order['address'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Subtotal:</span>
                    <span>Ksh<?= number_format($order['subtotal'], 2) ?></span>
                </div>
                <div class="summary-item">
                    <span>Tax (10%):</span>
                    <span>Ksh<?= number_format($order['tax'], 2) ?></span>
                </div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <span>Ksh<?= number_format($order['total'], 2) ?></span>
                </div>
            </div>
            
            <h2>Order Items</h2>
            <ul class="order-items">
                <?php foreach ($orderItems as $item): ?>
                    <li>
                        <?= $item['product_id'] ?> - Quantity: <?= $item['quantity'] ?> - Ksh<?= number_format($item['price'], 2) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>