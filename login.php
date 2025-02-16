<?php
session_start(); // Start the session
require 'backend/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the users table
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id']; // Store user ID in session
        $_SESSION['user_name'] = $user['name']; // Store user name for display
        header("Location: dashboard.php"); // Redirect to user dashboard
        exit();
    } else {
        echo "Invalid email or password!";
    }
}
?>
