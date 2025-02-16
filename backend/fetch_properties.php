<?php
require 'db_connection.php';

$stmt = $pdo->query("SELECT * FROM properties");
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($properties);
?>
