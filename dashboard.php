<?php
session_start();
require 'backend/db_connection.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Fetch agent's properties
$stmt = $pdo->prepare("SELECT * FROM properties WHERE agent_id = ?");
$stmt->execute([$user_id]);
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch transactions related to the agent
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE agent_id = ?");
$stmt->execute([$user_id]);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch appointments related to the agent's properties
$stmt = $pdo->prepare("
    SELECT a.*, p.location 
    FROM appointments a 
    JOIN properties p ON a.property_id = p.property_id 
    WHERE p.agent_id = ?
");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?></h1>

        <!-- Properties Section -->
        <section>
            <h2>Your Properties</h2>
            <table>
                <tr>
                    <th>Location</th>
                    <th>Area (sq ft)</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($property['location']); ?></td>
                        <td><?php echo $property['area']; ?></td>
                        <td><?php echo $property['bedrooms']; ?></td>
                        <td><?php echo $property['bathrooms']; ?></td>
                        <td>
                            <a href="edit_property.php?id=<?php echo $property['property_id']; ?>" class="btn btn-edit">Edit</a> |
                            <a href="delete_property.php?id=<?php echo $property['property_id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="add_property.html" class="btn btn-add">Add New Property</a>
        </section>

        <!-- Transactions Section -->
        <section>
            <h2>Transactions</h2>
            <table>
                <tr>
                    <th>Property ID</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?php echo $transaction['property_id']; ?></td>
                        <td><?php echo ucfirst($transaction['transaction_type']); ?></td>
                        <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                        <td><?php echo $transaction['transaction_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <!-- Appointments Section -->
        <section>
            <h2>Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Appointment Date</th>
                        <th>Message</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($appointment['location']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['user_email']); ?></td>
                            <td><?php echo $appointment['appointment_date']; ?></td>
                            <td><?php echo htmlspecialchars($appointment['message']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </section>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
