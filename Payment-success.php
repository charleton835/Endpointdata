<?php
session_start();
require_once __DIR__ . '/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the selected plan from the query parameter
$plan = $_GET['plan'] ?? 'basic';

// Define plan details
$plans = [
    'basic' => 'Basic',
    'professional' => 'Professional',
    'starter' => 'Starter',
    'business' => 'Business',
    'growth' => 'Growth',
    'department' => 'Department',
    'agency' => 'Agency',
];

// Check if the selected plan exists
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
    <title>Payment Success - EndpointGuard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Payment-success.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Payment Successful</h1>
            <p>Thank you for your purchase!</p>
        </header>

        <div class="payment-success-details">
            <h2>Plan Details</h2>
            <p><strong>Plan:</strong> <?= htmlspecialchars($selectedPlan) ?></p>
            <p>Your payment was successful. You can now enjoy the benefits of the <?= htmlspecialchars($selectedPlan) ?> plan.</p>
        </div>

        <a href="dashboard.php" class="cta-button">Go to Dashboard</a>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date("Y") ?> EndpointGuard. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>