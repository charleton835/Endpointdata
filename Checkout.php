<?php
session_start();

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$cartItems = $_SESSION['cart'] ?? [];

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['subscription_price_min'] * $item['quantity']; 
}
$tax = $subtotal * 0.1; 
$total = $subtotal + $tax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Checkout.css">
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        
        <form action="../../server/process_checkout.php" method="POST">
            <h2>Billing Information</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <h2>Payment Information</h2>
            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" name="paymentMethod" required>
                <option value="creditCard">Credit/Debit Card</option>
                <option value="paypal">PayPal</option>
                <option value="mobileMoney">Mobile Money</option>
            </select>
            
            <div id="creditCardInfo" class="payment-info">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber">
                
                <label for="expiryDate">Expiry Date:</label>
                <input type="text" id="expiryDate" name="expiryDate">
                
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv">
            </div>
            
            <div id="paypalInfo" class="payment-info" style="display: none;">
                <p>You will be redirected to PayPal to complete your purchase.</p>
            </div>
            
            <div id="mobileMoneyInfo" class="payment-info" style="display: none;">
                <label for="mobileNumber">Mobile Number:</label>
                <input type="text" id="mobileNumber" name="mobileNumber">
            </div>
            
            <h2>Order Summary</h2>
            <div class="summary-item">
                <span>Subscription (Monthly):</span>
                <span>Ksh<?= number_format($subtotal, 2) ?></span>
            </div>
            <div class="summary-item">
                <span>Tax (10%):</span>
                <span>Ksh<?= number_format($tax, 2) ?></span>
            </div>
            <div class="summary-item total">
                <span>Total (First Month):</span>
                <span>Ksh<?= number_format($total, 2) ?></span>
            </div>
            
            <div class="subscription-info">
                <p>By completing this checkout, you agree to a recurring monthly subscription. You will be billed each month until you cancel your subscription.</p>
            </div>

            <!-- Hidden fields for subtotal, tax, total, and totalAmount -->
            <input type="hidden" name="subtotal" value="<?= $subtotal; ?>">
            <input type="hidden" name="tax" value="<?= $tax; ?>">
            <input type="hidden" name="total" value="<?= $total; ?>">
            <input type="hidden" name="totalAmount" value="<?= $total; ?>">

            <button type="submit" class="checkout-btn">Complete Purchase</button>
        </form>
    </div>

    <script>
        document.getElementById('paymentMethod').addEventListener('change', function() {
            document.querySelectorAll('.payment-info').forEach(function(element) {
                element.style.display = 'none';
            });
            var selectedMethod = this.value;
            if (selectedMethod === 'creditCard') {
                document.getElementById('creditCardInfo').style.display = 'block';
            } else if (selectedMethod === 'paypal') {
                document.getElementById('paypalInfo').style.display = 'block';
            } else if (selectedMethod === 'mobileMoney') {
                document.getElementById('mobileMoneyInfo').style.display = 'block';
            }
        });
    </script>
</body>
</html>