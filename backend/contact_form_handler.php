<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT) ?: null;
    $appointment_date = $_POST['appointment_date'] ?: null;


    // Basic validation
    if (empty($name) || empty($phone) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        $_SESSION['error_message'] = "Please fill out all required fields.";
        header("Location: ../pages/contactUs.php");
        exit();
    }

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO contact_messages (name, phone, email, subject, message, property_id, appointment_date) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        
        $stmt->execute([
            $name,
            $phone,
            $email,
            $subject,
            $message,
            $property_id,
            $appointment_date
        ]);

        $_SESSION['success_message'] = "Your message has been sent successfully!";
        header("Location: ../pages/contactUs.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error sending message: " . $e->getMessage();
        header("Location: ../pages/contactUs.php");
        exit();
    }
}
?>