<?php
session_start();
require '../backend/db_connection.php';

// Redirect if not logged in or not a customer
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'customer') {
    header("Location: loginPage.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; // Assuming email is stored in session

// Fetch appointments for the logged-in customer
$stmt = $pdo->prepare("
    SELECT a.*, p.location, u.name AS agent_name
    FROM appointments a
    JOIN properties p ON a.property_id = p.property_id
    JOIN users u ON p.agent_id = u.user_id
    WHERE a.user_email = ?
    ORDER BY a.appointment_date ASC
");
$stmt->execute([$user_email]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <link rel="stylesheet" href="../header_footer/header.css">
    <link rel="stylesheet" href="../styles/customer_appointments.css">
</head>

<body>
    <?php include '../header_footer/header.php'; ?>
    <div class="dashboard-container">
        <?php include '../header_footer/sidebar.php'; ?>
        <div class="dashboard-content">
            <div class="content-header">
                <h1>My Scheduled Appointments</h1>
            </div>
            <div class="appointments-list">
                <?php if (empty($appointments)): ?>
                    <p>You have no scheduled appointments.</p>
                <?php else: ?>
                    <?php foreach ($appointments as $appointment): ?>
                        <div class="appointment-card">
                            <h3>Appointment for: <?php echo htmlspecialchars($appointment['location']); ?></h3>
                            <p><strong>Agent:</strong> <?php echo htmlspecialchars($appointment['agent_name']); ?></p>
                            <p class="date">
                                <?php echo date("l, F jS, Y \a\\t g:i A", strtotime($appointment['appointment_date'])); ?>
                            </p>
                            <p><strong>Your Message:</strong> <?php echo !empty($appointment['message']) ? htmlspecialchars($appointment['message']) : 'No message provided.'; ?></p>
                            <div class="appointment-status">
                                <strong>Status:</strong> <span class="status-<?php echo strtolower($appointment['status']); ?>"><?php echo ucfirst($appointment['status']); ?></span>
                            </div>
                            <?php if ($appointment['status'] === 'scheduled' || $appointment['status'] === 'confirmed'): ?>
                            <div class="appointment-actions">
                                <form action="../backend/update_appointment_status.php" method="POST">
                                    <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="btn-cancel" onclick="return confirm('Are you sure you want to cancel this appointment?');">Cancel</button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>