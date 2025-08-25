<?php
header('Content-Type: application/json');
require 'db_connection.php';

try {
    // Fetch 6 random properties to feature on the homepage
    $stmt = $pdo->query("SELECT * FROM properties ORDER BY RAND() LIMIT 6");
    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($properties);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>