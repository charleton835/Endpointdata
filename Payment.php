<?php
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$plan = $_GET['plan'] ?? 'basic'; 

$plans = [
    'basic' => [
        'name' => 'Basic',
        'price' => 'Ksh129,251.00',
        'features' => [
            'Up to 100 users',
            'Basic threat protection',
            '24/7 support',
            'Cloud backup',
        ],
    ],
    'professional' => [
        'name' => 'Professional',
        'price' => 'Ksh258,631.00',
        'features' => [
            'Up to 500 users',
            'Advanced threat protection',
            'Priority support',
            'Advanced analytics',
            'API access',
        ],
    ],
    'starter' => [
        'name' => 'Starter',
        'price' => 'Ksh12,806.00',
        'features' => [
            'Up to 10 users',
            'Basic threat protection',
            'Email security',
            'Basic firewall setup',
        ],
    ],
    'business' => [
        'name' => 'Business',
        'price' => 'Ksh25,741.00',
        'features' => [
            'Up to 100 users',
            'Advanced threat protection',
            'Email security',
            'Firewall setup and monitoring',
            'Cloud backup',
        ],
    ],
    'growth' => [
        'name' => 'Growth',
        'price' => 'Ksh51,611.00',
        'features' => [
            'Up to 500 users',
            'Advanced threat protection',
            'Priority support',
            'Cloud backup with disaster recovery',
            'API access',
        ],
    ],
    'department' => [
        'name' => 'Department',
        'price' => 'Custom',
        'features' => [
            'Department-wide deployment',
            'Basic compliance package',
            '24/7 dedicated support',
            'Secure cloud infrastructure',
        ],
    ],
    'agency' => [
        'name' => 'Agency',
        'price' => 'Custom',
        'features' => [
            'Agency-wide deployment',
            'Full compliance package',
            'Dedicated security team',
            'Air-gap implementation',
            'Custom security protocols',
        ],
    ],
];

if (!array_key_exists($plan, $plans)) {
    die("Invalid plan selected.");
}

$selectedPlan = $plans[$plan];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - EndpointGuard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Payment.css">
</head>
<body data-current-page="Payment.php">
    <div class="container">
        <header class="page-header">
            <h1>Payment</h1>
            <p>Complete your purchase for the <?= htmlspecialchars($selectedPlan['name']) ?> plan.</p>
        </header>

        <div class="payment-details">
            <h2>Plan Details</h2>
            <p><strong>Plan:</strong> <?= htmlspecialchars($selectedPlan['name']) ?></p>
            <p><strong>Price:</strong> <?= htmlspecialchars($selectedPlan['price']) ?> /month</p>
            <h3>Features:</h3>
            <ul>
                <?php foreach ($selectedPlan['features'] as $feature): ?>
                    <li><?= htmlspecialchars($feature) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <form action="../../server/Payment-process.php" method="POST" class="payment-form">
            <h2>Payment Information</h2>

            <input type="hidden" name="plan" value="<?= htmlspecialchars($plan) ?>">

            <label>
                <input type="radio" name="payment-method" value="card" required> Credit/Debit Card
            </label>
            <div class="card-info">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card-number">

                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry-date" name="expiry-date">

                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
            </div>

            <label>
                <input type="radio" name="payment-method" value="paypal" required> PayPal
            </label>
            <label>
                <input type="radio" name="payment-method" value="mpesa" required> M-Pesa
            </label>
            <div class="mpesa-info">
                <label for="mpesa-number">M-Pesa Phone Number</label>
                <input type="text" id="mpesa-number" name="mpesa-number">
            </div>

            <button type="submit" class="cta-button">Pay Now</button>
        </form>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date("Y") ?> EndpointGuard. All rights reserved.</p>
        </div>
    </footer>
    <script src="../js/script.js"></script>
    <script>
        document.querySelectorAll('input[name="payment-method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelector('.card-info').style.display = this.value === 'card' ? 'block' : 'none';
                document.querySelector('.paypal-info').style.display = this.value === 'paypal' ? 'block' : 'none';
                document.querySelector('.mpesa-info').style.display = this.value === 'mpesa' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>