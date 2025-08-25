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

// Fetch bookmarked properties for the logged-in user
$stmt = $pdo->prepare("
    SELECT p.* FROM properties p
    JOIN bookmarks b ON p.property_id = b.property_id
    WHERE b.user_id = ?
");
$stmt->execute([$user_id]);
$bookmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>

        <section>
            <h2>Your Bookmarked Properties</h2>
            <?php if (empty($bookmarks)): ?>
                <p>You have no bookmarked properties yet. You can add properties from the listing page.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookmarks as $property): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($property['location']); ?></td>
                                <td><?php echo ucfirst($property['type']); ?></td>
                                <td><?php echo ($property['status'] == 'for-rent') ? 'For Rent' : 'For Sale'; ?></td>
                                <td>$<?php echo number_format($property['price'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>

        <a href="../logout.php">Logout</a>
    </div>
</body>
</html>