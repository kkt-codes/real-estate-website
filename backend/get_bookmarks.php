<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'customer') {
    echo json_encode([]); // Return empty array if not a logged-in customer
    exit();
}

require 'db_connection.php';
$user_id = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT property_id FROM bookmarks WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $bookmarks = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    echo json_encode($bookmarks);
} catch (PDOException $e) {
    echo json_encode([]);
}
?>