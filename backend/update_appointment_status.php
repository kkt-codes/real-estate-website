<?php
session_start();
require 'db_connection.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/loginPage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = filter_var($_POST['appointment_id'], FILTER_VALIDATE_INT);
    $new_status = $_POST['status']; // 'confirmed' or 'cancelled'
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];

    if ($appointment_id === false || ($new_status !== 'confirmed' && $new_status !== 'cancelled')) {
        $_SESSION['error_message'] = "Invalid data provided.";
        header("Location: " . ($user_type === 'agent' ? '../pages/agent_appointments.php' : '../pages/customer_appointments.php'));
        exit();
    }

    try {
        // Security check: ensure the user has permission to modify the appointment
        if ($user_type === 'agent') {
            $stmt = $pdo->prepare("SELECT a.appointment_id FROM appointments a JOIN properties p ON a.property_id = p.property_id WHERE a.appointment_id = ? AND p.agent_id = ?");
            $stmt->execute([$appointment_id, $user_id]);
        } else { // customer
            $stmt = $pdo->prepare("SELECT appointment_id FROM appointments WHERE appointment_id = ? AND user_email = ?");
            $stmt->execute([$appointment_id, $_SESSION['user_email']]);
        }

        if ($stmt->fetch()) {
            // User is authorized, so update the status
            $update_stmt = $pdo->prepare("UPDATE appointments SET status = ? WHERE appointment_id = ?");
            $update_stmt->execute([$new_status, $appointment_id]);
            $_SESSION['success_message'] = "Appointment status updated successfully!";
        } else {
            $_SESSION['error_message'] = "You do not have permission to modify this appointment.";
        }

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error updating appointment: " . $e->getMessage();
    }

    header("Location: " . ($user_type === 'agent' ? '../pages/agent_appointments.php' : '../pages/customer_appointments.php'));
    exit();
}
?>