<?php
session_start();
include('database.php');

if (!isset($_GET['token'])) {
    die("❌ Invalid request.");
}

$token = $_GET['token'];

// Check if the token exists in the database
$stmt = $conn->prepare("SELECT id FROM users WHERE verification_token = ?");
$stmt->execute([$token]);

if ($stmt->rowCount() > 0) {
    // Activate the user account
    $stmt = $conn->prepare("UPDATE users SET is_verified = 1, verification_token = NULL WHERE verification_token = ?");
    if ($stmt->execute([$token])) {
        echo "✅ Email verified successfully! You can now <a href='../client/login.php'>Login</a>.";
    } else {
        echo "❌ Error verifying email. Try again later.";
    }
} else {
    echo "❌ Invalid or expired verification token.";
}
?>

