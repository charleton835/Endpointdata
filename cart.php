<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'status' => 'success',
        'cart' => $_SESSION['cart'] ?? []
    ]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['action'])) {
        echo json_encode(['status' => 'error', 'message' => 'No action specified']);
        exit();
    }

    switch ($input['action']) {
        case 'update':
            if (isset($input['cart'])) {
                $_SESSION['cart'] = $input['cart'];
            }
            break;

        case 'remove':
            if (isset($input['id'])) {
                $_SESSION['cart'] = array_values(array_filter($_SESSION['cart'] ?? [], function($item) use ($input) {
                    return $item['id'] !== $input['id'];
                }));
            }
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
            exit();
    }

    echo json_encode([
        'status' => 'success',
        'cart' => $_SESSION['cart'] ?? []
    ]);
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
exit();