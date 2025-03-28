<?php
require_once '../../server/database.php';
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['quick-name']);
    $email = filter_var(trim($_POST['quick-email']), FILTER_VALIDATE_EMAIL);
    $question = trim($_POST['quick-question']);

    if ($name && $email && $question) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO expert_advice (name, email, question) VALUES (:name, :email, :question)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':question' => $question
            ]);
            header("Location: Success.php");
            exit();
        } catch (PDOException $e) {
            header("Location: Error.php?msg=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        header("Location: Error.php?msg=" . urlencode("All fields are required and must be valid."));
        exit();
    }
}
?>
