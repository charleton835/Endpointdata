<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/Signup.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body data-current-page="signup.php">
    <!-- Signup Section -->
    <section class="signup-section">
        <div class="signup-container">
            <h1>Create an Account</h1>
            <p>Sign up to get started with our services.</p>

            <?php if (isset($_SESSION['signup_error'])): ?>
                <p class="error"><?php echo $_SESSION['signup_error']; unset($_SESSION['signup_error']); ?></p>
            <?php endif; ?>

            <!-- Signup Form -->
            <form class="signup-form" action="../../server/signup.php" method="POST">
                <input type="text" name="full-name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                
                <div class="password-container">
                    <input type="password" name="password" placeholder="Password" required>
                    <span class="toggle-password">Show</span>
                </div>
                
                <div class="password-container">
                    <input type="password" name="confirm-password" placeholder="Confirm Password" required>
                    <span class="toggle-password">Show</span>
                </div>

                <button type="submit" class="btn">Sign Up</button>
            </form>

            <!-- Login Link -->
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </div>
    </section>

    <script src="../js/Formvalidation.js"></script>
    <script src="../js/script.js"></script>
    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function () {
                const passwordField = this.previousElementSibling;
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    this.textContent = 'Hide';
                } else {
                    passwordField.type = 'password';
                    this.textContent = 'Show';
                }
            });
        });
    </script>
</body>

</html>