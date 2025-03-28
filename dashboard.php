<?php
session_start();

// Redirect if not logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome to Admin Dashboard</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
