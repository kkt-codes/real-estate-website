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
    $location = trim($_POST['location']);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $area = filter_var($_POST['area'], FILTER_VALIDATE_INT);
    $bedrooms = filter_var($_POST['bedrooms'], FILTER_VALIDATE_INT);
    $bathrooms = filter_var($_POST['bathrooms'], FILTER_VALIDATE_INT);
    $type = $_POST['type'];
    $status = $_POST['status'];
    $short_description = trim($_POST['short_description']);
    $description = trim($_POST['description']);
    $agent_id = $_SESSION['user_id'];

    // Image Upload Handling
    $image_paths = [];
    $target_dir = "../assets/uploads/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            if ($_FILES['images']['error'][$key] == 0) {
                $target_file = $target_dir . basename($name);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Basic validation for image files
                $check = getimagesize($_FILES['images']['tmp_name'][$key]);
                if ($check !== false) {
                    // Create a unique name for the file to prevent overwriting
                    $new_filename = uniqid('', true) . '.' . $imageFileType;
                    $new_target_file = $target_dir . $new_filename;

                    if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $new_target_file)) {
                        // Store the relative path for the database
                        $image_paths[] = '../assets/uploads/' . $new_filename;
                    }
                }
            }
        }
    }
    
    $images_string = implode(',', $image_paths);

    // Basic validation
    if (empty($location) || $price === false || $area === false || $bedrooms === false || $bathrooms === false || empty($type) || empty($status) || empty($short_description) || empty($description) || empty($images_string)) {
        $_SESSION['error_message'] = "Please provide valid inputs for all fields and upload at least one image.";
        header("Location: ../pages/add_property.php");
        exit();
    }

    try {
        $stmt = $pdo->prepare(
            "INSERT INTO properties (agent_id, location, price, area, bedrooms, bathrooms, type, status, short_description, description, images) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        
        $stmt->execute([
            $agent_id,
            $location,
            $price,
            $area,
            $bedrooms,
            $bathrooms,
            $type,
            $status,
            $short_description,
            $description,
            $images_string
        ]);

        $_SESSION['success_message'] = "Property added successfully!";
        header("Location: ../pages/agent_dashboard.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        header("Location: ../pages/add_property.php");
        exit();
    }
}
?>