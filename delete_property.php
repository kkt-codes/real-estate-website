<?php
require 'backend/db_connection.php';
session_start();

// Check if the user is logged in and is an agent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['agent_id'])) {
        echo "Unauthorized access! Please log in as an agent.";
        exit();
    }

    // Retrieve agent ID and property ID from the form
    $agent_id = $_SESSION['agent_id'];
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT);

    // Validate the property ID
    if (!$property_id) {
        echo "Invalid property ID.";
        exit();
    }

    try {
        // Ensure the agent owns the property
        $check_stmt = $pdo->prepare("SELECT agent_id FROM properties WHERE property_id = ?");
        $check_stmt->execute([$property_id]);
        $property = $check_stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the property exists and if the agent is the owner
        if (!$property || $property['agent_id'] != $agent_id) {
            echo "Unauthorized action! You can only delete properties you own.";
            exit();
        }

        // Proceed to delete the property
        $stmt = $pdo->prepare("CALL DeleteProperty(?)");
        $stmt->execute([$property_id]);

        // Check if deletion was successful
        if ($stmt->rowCount() > 0) {
            echo "Property deleted successfully!";
        } else {
            echo "Error: Property deletion failed. Please try again.";
        }

    } catch (PDOException $e) {
        // Handle database-related errors
        echo "Error: " . $e->getMessage();
    }
}
?>
