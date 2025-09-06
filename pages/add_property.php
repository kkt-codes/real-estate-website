<?php
session_start();
require '../backend/db_connection.php';

// Redirect if not logged in or not an agent
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'agent') {
    header("Location: loginPage.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <link rel="stylesheet" href="../header_footer/header.css">
    <link rel="stylesheet" href="../styles/add_property.css">
</head>
<body>
    <?php include '../header_footer/header.php'; ?>
    <div class="dashboard-container">
        <?php include '../header_footer/sidebar.php'; ?>
        <div class="dashboard-content">
            <div class="form-container">
                <h1>Add a New Property</h1>
                <form action="../backend/add_property.php" method="POST" enctype="multipart/form-data">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input type="number" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="area">Area (sqm)</label>
                            <input type="number" id="area" name="area" required>
                        </div>
                        <div class="form-group">
                            <label for="bedrooms">Bedrooms</label>
                            <input type="number" id="bedrooms" name="bedrooms" required>
                        </div>
                         <div class="form-group">
                            <label for="bathrooms">Bathrooms</label>
                            <input type="number" id="bathrooms" name="bathrooms" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Property Type</label>
                            <select id="type" name="type" required>
                                <option value="apartment">Apartment</option>
                                <option value="villa">Villa</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="for-sale">For Sale</option>
                                <option value="for-rent">For Rent</option>
                            </select>
                        </div>
                        <div class="form-group full-width">
                            <label for="short_description">Short Description (max 255 chars)</label>
                            <input type="text" id="short_description" name="short_description" maxlength="255" required>
                        </div>
                        <div class="form-group full-width">
                            <label for="description">Full Description</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label for="images">Property Images</label>
                            <input type="file" id="images" name="images[]" multiple required>
                        </div>
                        <div class="form-actions">
                            <button type="submit">Add Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        <?php
            if (isset($_SESSION['success_message'])) {
                echo "alert('" . addslashes($_SESSION['success_message']) . "');";
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['error_message'])) {
                echo "alert('" . addslashes($_SESSION['error_message']) . "');";
                unset($_SESSION['error_message']);
            }
        ?>
    </script>
</body>
</html>