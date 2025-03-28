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
    <title>Submission Error</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <section class="error-message">
        <div class="container">
            <h2>Error</h2>
            <p>There was an error submitting your consultation request. Please try again later.</p>
            <button onclick="window.location.href='consultation.php'" class="btn btn-primary">Try Again</button>
            <button onclick="window.location.href='ContactUs.php'" class="btn btn-secondary">Contact Us</button>
        </div>
    </section>

</body>
</html>