<?php
session_start();
session_destroy();
header("Location: ../public/pages/Login.php"); // Redirects correctly
exit;
?>
