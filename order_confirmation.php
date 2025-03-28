<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>
        
        <?php if (isset($_SESSION['success'])): ?>
            <p><?= htmlspecialchars($_SESSION['success']) ?></p>
            <?php unset($_SESSION['success']); ?>
        <?php else: ?>
            <p>No order has been placed.</p>
        <?php endif; ?>
        
        <a href="Products.php" class="btn">Continue Shopping</a>
    </div>
</body>
</html>