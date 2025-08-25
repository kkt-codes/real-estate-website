<?php
session_start();
require 'db_connection.php';

$login_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $login_error = "Please enter both email and password.";
    } else {
        try {
            // Fetch user from the users table
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_type'] = $user['user_type'];

                // Redirect based on user type
                if ($user['user_type'] === 'agent') {
                    header("Location: ../pages/agent_dashboard.php");
                } else {
                    header("Location: ../pages/customer_dashboard.php");
                }
                exit();
            } else {
                // Invalid credentials
                $login_error = "Invalid email or password!";
                // Redirect back to the login page with an error message
                header("Location: ../pages/loginPage.php?error=" . urlencode($login_error));
                exit();
            }
        } catch (PDOException $e) {
            error_log("Login Error: " . $e->getMessage());
            $login_error = "An error occurred. Please try again later.";
            header("Location: ../pages/loginPage.php?error=" . urlencode($login_error));
            exit();
        }
    }
} else {
    // Redirect to login page if accessed directly without POST
    header("Location: ../pages/loginPage.php");
    exit();
}
?>