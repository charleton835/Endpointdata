<?php 
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../server/database.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    try {
        // Use $GLOBALS['pdo'] instead of $conn
        $stmt = $GLOBALS['pdo']->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: Admin.php");
            exit();
        } else {
            $_SESSION["login_error"] = "Invalid email or password.";
            header("Location: Admin_login.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link rel="stylesheet" href="../public/css/admin_login.css">
    <style>
        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="login-section">
        <div class="login-container">
            <h1>Admin Login</h1>
            <p>Enter your credentials to access your account.</p>

            <?php if (isset($_SESSION['login_error'])): ?>
                <p class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
            <?php endif; ?>

            <form class="login-form" action="admin_login.php" method="POST">
                <input type="email" name="email" placeholder="Email Address" required>
                
                <div class="password-container">
                    <input type="password" name="password" placeholder="Password" required>
                    <span class="toggle-password">Show</span>
                </div>
                
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </section>

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