<?php 
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('database.php'); 

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

            header("Location: ../public/pages/Solutions.php");
            exit();
        } else {
            $_SESSION["login_error"] = "Invalid email or password.";
            header("Location: ../public/pages/login.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
ob_end_flush();
?>

