<?php
// auth.php
session_start();
include('database.php'); // Connect to the database

// User Authentication Function
function authenticateUser($email, $password) {
    global $conn;

    if (empty($email) || empty($password)) {
        return "Email and password are required!";
    }

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            return "success"; // Login successful
        } else {
            return "Invalid email or password!";
        }
    } else {
        return "User not found!";
    }
}

// Handle Login Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $authResult = authenticateUser($email, $password);

    if ($authResult === "success") {
        header("Location: home.php"); // Redirect to dashboard
        exit;
    } else {
        echo $authResult; // Show error message
    }
}

// Password Reset Function (Requires Email Verification)
function resetPassword($email, $newPassword) {
    global $conn;

    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    $query = "UPDATE users SET password = :password WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    return $stmt->execute() ? "Password reset successful!" : "Error resetting password!";
}

// Email Verification Function (You need to implement an email system)
function verifyEmail($email) {
    global $conn;

    $query = "UPDATE users SET verified = 1 WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);

    return $stmt->execute() ? "Email verified successfully!" : "Error verifying email!";
}
?>
