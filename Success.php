<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Request Submitted</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="success-message">
        <div class="container">
            <h2>Success!</h2>
            <p>Your consultation request has been successfully submitted. Our team will get back to you shortly.</p>
            <button onclick="window.location.href='Home.php'" class="btn btn-primary">Go to Home</button>
            <button onclick="window.location.href='ContactUs.php'" class="btn btn-secondary">Contact Us</button>
        </div>
    </section>


</body>
</html>