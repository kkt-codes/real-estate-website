<?php
require 'backend/db_connection.php';
session_start();

// Check if the user is logged in and is an agent
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['agent_id'])) {
        $_SESSION['error'] = "Unauthorized access! Please log in as an agent.";
        header("Location: login.php");
        exit();
    }

    // Retrieve agent ID and property ID from the form
    $agent_id = $_SESSION['agent_id'];
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT);

    // Validate the property ID
    if (!$property_id) {
        $_SESSION['error'] = "Invalid property ID.";
        header("Location: dashboard.php");
        exit();
    }

    try {
        // Ensure the agent owns the property
        $check_stmt = $pdo->prepare("SELECT agent_id FROM properties WHERE property_id = ?");
        $check_stmt->execute([$property_id]);
        $property = $check_stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the property exists and if the agent is the owner
        if (!$property || $property['agent_id'] != $agent_id) {
            $_SESSION['error'] = "Unauthorized action! You can only delete properties you own.";
            header("Location: dashboard.php");
            exit();
        }

        // Proceed to delete the property
        $stmt = $pdo->prepare("CALL DeleteProperty(?)");
        $stmt->execute([$property_id]);

        // Set success message and redirect
        $_SESSION['success'] = "Property deleted successfully!";
        header("Location: dashboard.php");
        exit();

    } catch (PDOException $e) {
        // Handle database-related errors
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: dashboard.php");
        exit();
    }
}
?>
