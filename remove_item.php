
<?php 
// remove_item.php
include './db_connection/conn.php';

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    
    // Prepare a statement to delete the item
    $stmt = $pdo->prepare("UPDATE tbl_shopping SET quantity = 0 WHERE id = :id");
    $stmt->execute(['id' => $id]);
    
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'ID not provided']);
}
?>