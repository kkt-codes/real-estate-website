<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values that are part of the appointments table
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT);
    $appointment_date = $_POST['appointment_date'];
    $message = htmlspecialchars($_POST['message']);

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        $_SESSION['error_message'] = "Invalid email format.";
        header("Location: ../pages/property_detail.php?id=" . $property_id);
        exit();
    }

    // Check if the property ID is valid
    if ($property_id === false) {
        $_SESSION['error_message'] = "Invalid property ID.";
        header("Location: ../pages/listing.php");
        exit();
    }

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO appointments (user_name, user_email, property_id, appointment_date, message) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$name, $email, $property_id, $appointment_date, $message]);

        $_SESSION['success_message'] = "Your appointment request has been submitted successfully!";
        header("Location: ../pages/property_detail.php?id=" . $property_id . "&appointment=success");
        exit();

    } catch (PDOException $e) {
        error_log("Appointment Error: " . $e->getMessage()); // Log error for debugging
        $_SESSION['error_message'] = "There was an error submitting your request. Please try again later.";
        header("Location: ../pages/property_detail.php?id=" . $property_id);
        exit();
    }
}
?>