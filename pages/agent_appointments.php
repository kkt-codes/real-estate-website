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

// Fetch appointments related to the agent's properties
$stmt = $pdo->prepare("
    SELECT a.*, p.location 
    FROM appointments a 
    JOIN properties p ON a.property_id = p.property_id 
    WHERE p.agent_id = ? 
    ORDER BY a.appointment_date ASC
");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Appointments</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <link rel="stylesheet" href="../header_footer/header.css">
    <link rel="stylesheet" href="../styles/agent_appointments.css">
</head>
<body>
    <?php include '../header_footer/header.php'; ?>
    <div class="dashboard-container">
        <?php include '../header_footer/sidebar.php'; ?>
        <div class="dashboard-content">
            <div class="content-header">
                <h1>Upcoming Appointments</h1>
            </div>
            <div class="appointments-list">
                <?php if (empty($appointments)): ?>
                    <p>You have no upcoming appointments.</p>
                <?php else: ?>
                    <?php foreach ($appointments as $appointment): ?>
                        <div class="appointment-card">
                            <div class="info">
                                <h3>Appointment for: <?php echo htmlspecialchars($appointment['location']); ?></h3>
                                <p><strong>Client:</strong> <?php echo htmlspecialchars($appointment['user_name']); ?></p>
                                <p><strong>Email:</strong> <?php echo htmlspecialchars($appointment['user_email']); ?></p>
                                <p class="date">
                                    <?php echo date("l, F jS, Y \a\\t g:i A", strtotime($appointment['appointment_date'])); ?>
                                </p>
                            </div>
                            <div class="message">
                                <p><strong>Message:</strong></p>
                                <p><?php echo !empty($appointment['message']) ? htmlspecialchars($appointment['message']) : 'No message provided.'; ?></p>
                            </div>
                            <div class="appointment-status">
                                <strong>Status:</strong> <span class="status-<?php echo strtolower($appointment['status']); ?>"><?php echo ucfirst($appointment['status']); ?></span>
                            </div>
                             <?php if ($appointment['status'] === 'scheduled'): ?>
                            <div class="appointment-actions">
                                <form action="../backend/update_appointment_status.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="btn-confirm">Confirm</button>
                                </form>
                                <form action="../backend/update_appointment_status.php" method="POST" style="display: inline-block;">
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