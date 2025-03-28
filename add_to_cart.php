<?php
session_start();

$response = ['status' => 'error', 'message' => 'An error occurred', 'cartCount' => 0];

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    $response['message'] = 'User not logged in';
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json');
    $response['message'] = 'Invalid request method';
    echo json_encode($response);
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product = [
    'id' => uniqid(),
    'name' => $_POST['name'] ?? '',
    'subscription_price_min' => floatval($_POST['subscription_price_min'] ?? 0),
    'subscription_price_max' => floatval($_POST['subscription_price_max'] ?? 0),
    'image' => $_POST['image'] ?? '',
    'quantity' => 1
];

if (empty($product['name']) || $product['subscription_price_min'] <= 0) {
    header('Content-Type: application/json');
    $response['message'] = 'Invalid product data';
    echo json_encode($response);
    exit();
}

$productExists = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $product['name']) {
        $item['quantity']++;
        $productExists = true;
        break;
    }
}

if (!$productExists) {
    $_SESSION['cart'][] = $product;
}

$response['status'] = 'success';
$response['message'] = 'Product added to cart successfully';
$response['cartCount'] = count($_SESSION['cart']);

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>