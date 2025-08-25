<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values and sanitize inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING); // Optional, depending on the database structure
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT); // Validate as integer
    $appointment_date = $_POST['appointment_date']; // Expected format: YYYY-MM-DDTHH:MM
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    // Check if the property ID is valid if it's provided
    if ($property_id && !is_numeric($property_id)) {
        echo "Invalid property ID.";
        exit();
    }

    try {
        // Insert the appointment details into the database
        $stmt = $pdo->prepare("INSERT INTO appointments (user_name, user_email, property_id, appointment_date, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $property_id, $appointment_date, $message]);

        // Redirect or provide feedback to the user
        $_SESSION['success'] = "Your appointment request has been submitted successfully!";
        header("Location: thank_you.php"); // Redirect to a thank you page (optional)
        exit();

    } catch (PDOException $e) {
        // Handle database errors (e.g., insertion failure)
        echo "Error: " . $e->getMessage();
    }
}
?>
