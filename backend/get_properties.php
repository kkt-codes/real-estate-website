<?php
header('Content-Type: application/json');
require 'db_connection.php';

try {
    $stmt = $pdo->query("SELECT * FROM properties");
    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($properties);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>