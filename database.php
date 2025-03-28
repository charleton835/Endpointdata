<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "endpoint_security";

try {
    $GLOBALS['pdo'] = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Debug: Database connected successfully";
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
