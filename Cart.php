<?php
session_start();

$_SESSION['cart'] = $_SESSION['cart'] ?? [];

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); 
            break;
        }
    }
    header("Location: cart.php");
    exit();
}

// Function to update quantities
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        foreach ($_SESSION['cart'] as &$item) {
            if (intval($item['id']) === intval($id)) {
                $item['quantity'] = max(1, intval($quantity));
                break;
            }
        }
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/Cart.css">
</head>
<body>

<div class="container">
    <h2 class="cart-title">Shopping Cart</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
        <div class="cart-container">
            <div class="cart-items">
                <form action="cart.php" method="post">
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $price = isset($item['subscription_price_min']) ? floatval($item['subscription_price_min']) : 0;
                        $quantity = isset($item['quantity']) ? intval($item['quantity']) : 1;
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                    ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['image'] ?? 'default.jpg'; ?>" alt="Product" class="cart-item-image">
                        <div class="cart-item-details">
                            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            <p class="price">Ksh<?php echo number_format($price, 2); ?></p>
                            <div class="quantity-controls">
                                <input type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $quantity; ?>" min="1">
                                <button type="submit" name="update_cart" class="quantity-btn">Update</button>
                            </div>
                        </div>
                        <p class="price">Subtotal: Ksh<?php echo number_format($subtotal, 2); ?></p>
                        <a href="cart.php?remove=<?php echo $item['id']; ?>" 
                           onclick="return confirm('Are you sure you want to remove this item?');" 
                           class="remove-btn">Remove</a>
                    </div>
                    <?php endforeach; ?>
                </form>
            </div>

            <div class="cart-summary">
                <h2>Order Summary</h2>
                <div class="summary-item">
                    <span>Subtotal:</span>
                    <span>Ksh<?php echo number_format($total, 2); ?></span>
                </div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <span>Ksh<?php echo number_format($total, 2); ?></span>
                </div>
                <button class="checkout-btn" <?php echo $total > 0 ? '' : 'disabled'; ?> onclick="window.location.href='checkout.php'">
                    Proceed to Checkout
                </button>
                <a href="index.php" class="continue-shopping">Continue Shopping</a>
            </div>
        </div>
    <?php else: ?>
        <div class="empty-cart">
            <i class="fas fa-shopping-cart fa-3x"></i>
            <p>Your cart is empty.</p>
            <a href="Products.php" class="continue-shopping">Continue Shopping</a>
        </div>
    <?php endif; ?>
</div>

<script src="../js/cart.js"></script>

</body>
</html>
