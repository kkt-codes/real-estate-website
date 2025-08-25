<?php
require 'db_connection.php';
session_start();

// Redirect if not logged in or not an agent
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'agent') {
    header("Location: pages/loginPage.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized access! Please log in.";
    exit();
}

// Set agent_id since every logged-in user is an agent
$agent_id = $_SESSION['user_id'];

// Check if a property ID is passed via GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid property ID.";
    exit();
}

$property_id = $_GET['id'];

// Fetch the property details to verify ownership
try {
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE property_id = ? AND agent_id = ?");
    $stmt->execute([$property_id, $agent_id]);
    $property = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$property) {
        echo "Property not found or you do not have permission to delete it.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error fetching property details: " . $e->getMessage();
    exit();
}

// If form is submitted, delete the property
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $pdo->prepare("CALL DeleteProperty(?)");
        $stmt->execute([$property_id]);

        // Property deleted successfully, redirect to dashboard
        header("Location: ../pages/agent_dashboard.php");
        exit();

    } catch (PDOException $e) {
        echo "Error deleting property: " . $e->getMessage();
        exit();
    }
}
?>
