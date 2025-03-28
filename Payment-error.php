<?php
$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'An unknown error occurred.';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Error</title>
    <link rel="stylesheet" href="..css/style.css">
    <link rel="stylesheet" href="..css/Payment-error.css">
</head>
<body>

    <div class="container">
        <h1>Payment Error</h1>
        <p><strong>Error:</strong> <?= $error_message ?></p>
        <a href="Payment.php">Go Back to Payment</a>

    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date("Y") ?> EndpointGuard. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>