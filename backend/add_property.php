<?php
require 'db_connection.php';
session_start();

// Check if the user is logged in and is an agent
if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized access! Please log in.";
    exit();
}

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $location = trim($_POST['location']);
    $area = filter_var($_POST['area'], FILTER_VALIDATE_INT);
    $bedrooms = filter_var($_POST['bedrooms'], FILTER_VALIDATE_INT);
    $bathrooms = filter_var($_POST['bathrooms'], FILTER_VALIDATE_INT);

    // Check if input values are valid
    if (empty($location) || !$area || !$bedrooms || !$bathrooms) {
        echo "Please provide valid inputs for all fields.";
        exit();
    }

    // Retrieve agent ID from session
    $agent_id = $_SESSION['user_id'];

    try {
        // Prepare the stored procedure call to add the property
        $stmt = $pdo->prepare("CALL AddProperty(?, ?, ?, ?, ?)");
        $stmt->execute([$agent_id, $location, $area, $bedrooms, $bathrooms]);

        // Check if the property was successfully added
        if ($stmt->rowCount() > 0) {
            echo "Property added successfully!";
        } else {
            echo "Failed to add property. Please try again.";
        }

    } catch (PDOException $e) {
        // Handle specific errors (e.g., if agent already has 3 properties)
        if ($e->getCode() == 45000) {
            echo "Error: Agents can only manage up to 3 properties.";
        } else {
            // General database error handling
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
