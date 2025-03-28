<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset_password.css">
</head>

<body>
    <section class="reset-password-section">
        <div class="reset-password-container">
            <h1>Reset Password</h1>
            <p>Enter your email to verify your identity.</p>

            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>

            <?php if (isset($_SESSION['message'])): ?>
                <p class="success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
            <?php endif; ?>

            <form action="../../server/email_verification.php" method="POST">
                <input type="email" name="email" placeholder="Email Address" required>
                <button type="submit" class="btn">Verify Email</button>
            </form>

            <p><a href="login.php">Back to Login</a></p>
        </div>
    </section>
</body>

</html>
