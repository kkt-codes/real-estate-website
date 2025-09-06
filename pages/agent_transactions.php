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

// Fetch transactions related to the agent
$stmt = $pdo->prepare("SELECT t.*, p.location FROM transactions t JOIN properties p ON t.property_id = p.property_id WHERE t.agent_id = ? ORDER BY t.transaction_date DESC");
$stmt->execute([$user_id]);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Transactions</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <link rel="stylesheet" href="../header_footer/header.css">
</head>
<body>
    <?php include '../header_footer/header.php'; ?>
    <div class="dashboard-container">
        <?php include '../header_footer/sidebar.php'; ?>
        <div class="dashboard-content">
            <div class="content-header">
                <h1>Transactions</h1>
            </div>
            <div class="transactions-list">
                <?php if (empty($transactions)): ?>
                    <p>No transactions found.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Property</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($transaction['location']); ?></td>
                                    <td><?php echo ucfirst($transaction['transaction_type']); ?></td>
                                    <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                                    <td><?php echo date("F j, Y, g:i a", strtotime($transaction['transaction_date'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>