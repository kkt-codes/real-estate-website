<?php
require 'db_connection.php';
session_start();

// Redirect if not logged in or not an agent
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'agent') {
    header("Location: pages/loginPage.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized access! Please log in.";
    exit();
}

// Set agent_id since every logged-in user is an agent
$agent_id = $_SESSION['user_id'];


// Check if a property ID is passed via GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid property ID.";
    exit();
}

$property_id = $_GET['id'];

// Fetch the existing property details
try {
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE property_id = ? AND agent_id = ?");
    $stmt->execute([$property_id, $agent_id]);
    $property = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$property) {
        echo "Property not found or you do not have permission to edit it.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error fetching property details: " . $e->getMessage();
    exit();
}

// If form is submitted, update the property
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = trim($_POST['location']);
    $area = filter_var($_POST['area'], FILTER_VALIDATE_INT);
    $bedrooms = filter_var($_POST['bedrooms'], FILTER_VALIDATE_INT);
    $bathrooms = filter_var($_POST['bathrooms'], FILTER_VALIDATE_INT);

    if (!$area || !$bedrooms || !$bathrooms || empty($location)) {
        echo "Please provide valid inputs for all fields.";
        exit();
    }

    try {
        $stmt = $pdo->prepare("CALL UpdateProperty(?, ?, ?, ?, ?)");
        $stmt->execute([$property_id, $location, $area, $bedrooms, $bathrooms]);

        // Property updated successfully, redirect to dashboard
        header("Location: ../pages/agent_dashboard.php");
        /* echo "Property updated successfully!"; */
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
</head>
<body>
<div class="container">
    <h1>Edit Property</h1>
    <form method="POST" action="edit_property.php?id=<?php echo $property_id; ?>">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($property['location']); ?>" required>

        <label for="area">Area (sq ft):</label>
        <input type="number" id="area" name="area" value="<?php echo $property['area']; ?>" required>

        <label for="bedrooms">Bedrooms:</label>
        <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $property['bedrooms']; ?>" required>

        <label for="bathrooms">Bathrooms:</label>
        <input type="number" id="bathrooms" name="bathrooms" value="<?php echo $property['bathrooms']; ?>" required>

        <button type="submit">Update Property</button>
    </form>
    <a href="../pages/agent_dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
