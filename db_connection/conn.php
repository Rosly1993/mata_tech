<?php
$host = 'localhost';
$db = 'meta_tech';
$user = 'root'; // Change this if your MySQL user is different
$pass = ''; // Change this if your MySQL password is different

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
