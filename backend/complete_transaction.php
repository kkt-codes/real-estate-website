<?php
require 'db_connection.php';
session_start();

// Check if the user is logged in and is an agent
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'agent') {
    header("Location: ../pages/loginPage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $property_id = filter_var($_POST['property_id'], FILTER_VALIDATE_INT);
    $final_amount = filter_var($_POST['final_amount'], FILTER_VALIDATE_FLOAT);
    $transaction_type = $_POST['transaction_type']; // 'sale' or 'rent'
    $agent_id = $_SESSION['user_id'];

    if ($property_id === false || $final_amount === false || ($transaction_type !== 'sale' && $transaction_type !== 'rent')) {
        $_SESSION['error_message'] = "Invalid data provided for the transaction.";
        header("Location: ../pages/agent_dashboard.php");
        exit();
    }

    try {
        // Start a database transaction
        $pdo->beginTransaction();

        // 1. Create a new record in the transactions table
        $stmt = $pdo->prepare(
            "INSERT INTO transactions (property_id, agent_id, transaction_type, amount) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$property_id, $agent_id, $transaction_type, $final_amount]);

        // 2. Update the property's status
        $new_status = ($transaction_type === 'sale') ? 'sold' : 'rented';
        $update_stmt = $pdo->prepare("UPDATE properties SET status = ? WHERE property_id = ? AND agent_id = ?");
        $update_stmt->execute([$new_status, $property_id, $agent_id]);

        // Commit the transaction
        $pdo->commit();

        $_SESSION['success_message'] = "Transaction completed successfully!";
        header("Location: ../pages/agent_dashboard.php");
        exit();

    } catch (PDOException $e) {
        // Rollback the transaction if something failed
        $pdo->rollBack();
        $_SESSION['error_message'] = "Error completing transaction: " . $e->getMessage();
        header("Location: ../pages/agent_dashboard.php");
        exit();
    }
}
?>