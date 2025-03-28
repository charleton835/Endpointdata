<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="otp-section">
        <div class="otp-container">
            <h1>Verify OTP</h1>
            <p>Enter the OTP sent to your email.</p>

            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>

            <form action="../../server/verify_otp.php" method="POST">
                <input type="text" name="otp" placeholder="Enter OTP" required>
                <button type="submit" class="btn">Verify OTP</button>
            </form>

            <p><a href="reset_password.php">Resend OTP</a></p>
        </div>
    </section>
</body>

</html>
