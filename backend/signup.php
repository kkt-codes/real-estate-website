<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // 'agent' or 'customer'

    // Basic validation
    if (empty($name) || empty($email) || empty($password) || empty($user_type)) {
        echo "Please fill out all fields.";
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    if ($user_type !== 'agent' && $user_type !== 'customer') {
        echo "Invalid user type selected.";
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            echo "Email already registered. <a href='../pages/loginPage.php'>Login Here</a>";
            exit();
        }

        // Insert new user into the 'users' table
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, user_type) VALUES (:name, :email, :password_hash, :user_type)");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => $password_hash,
            'user_type' => $user_type
        ]);

        echo "Registration successful! <a href='../pages/loginPage.php'>Login Here</a>";
    } catch (PDOException $e) {
        // Log error instead of echoing in production
        error_log("Signup Error: " . $e->getMessage());
        echo "An error occurred. Please try again later.";
    }
}
?>