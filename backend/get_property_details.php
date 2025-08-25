<?php
header('Content-Type: application/json');
require 'db_connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Property ID is required.']);
    exit();
}

$property_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("
        SELECT p.*, u.name AS agent_name, u.email AS agent_email
        FROM properties p
        JOIN users u ON p.agent_id = u.user_id
        WHERE p.property_id = ?
    ");
    $stmt->execute([$property_id]);
    $property = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($property) {
        // Convert the comma-separated image string back into an array
        $property['images'] = explode(',', $property['images']);
        echo json_encode($property);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Property not found.']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>