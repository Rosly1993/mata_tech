<?php
include './db_connection/conn.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Get product ID from AJAX request
    // Update quantity in the database
    $stmt = $pdo->prepare("UPDATE tbl_shopping SET quantity = quantity + 1 WHERE id = :id");
    $stmt->execute(['id' => $id]);

    // Fetch the updated quantity to return it
    $stmt = $pdo->prepare("SELECT quantity FROM tbl_shopping WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $updatedItem = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'quantity' => $updatedItem['quantity']]);
    exit;
}

echo json_encode(['success' => false]);
