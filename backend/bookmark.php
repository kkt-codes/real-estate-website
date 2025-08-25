<?php
session_start();
header('Content-Type: application/json');
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'customer') {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $property_id = $data['property_id'];
    $user_id = $_SESSION['user_id'];

    if (empty($property_id)) {
        http_response_code(400);
        echo json_encode(['error' => 'Property ID is required']);
        exit();
    }

    try {
        // Check if the bookmark already exists
        $stmt = $pdo->prepare("SELECT * FROM bookmarks WHERE user_id = ? AND property_id = ?");
        $stmt->execute([$user_id, $property_id]);
        
        if ($stmt->fetch()) {
            // If it exists, remove it
            $delete_stmt = $pdo->prepare("DELETE FROM bookmarks WHERE user_id = ? AND property_id = ?");
            $delete_stmt->execute([$user_id, $property_id]);
            echo json_encode(['status' => 'removed']);
        } else {
            // If it doesn't exist, add it
            $insert_stmt = $pdo->prepare("INSERT INTO bookmarks (user_id, property_id) VALUES (?, ?)");
            $insert_stmt->execute([$user_id, $property_id]);
            echo json_encode(['status' => 'added']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}
?>