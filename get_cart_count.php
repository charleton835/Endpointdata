<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo json_encode(['status' => 'success', 'count' => $count]);
?>