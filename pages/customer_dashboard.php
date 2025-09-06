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
    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <link rel="stylesheet" href="../header_footer/header.css">
</head>
<body>
    <?php include '../header_footer/header.php'; ?>
    <div class="dashboard-container">
        <?php include '../header_footer/sidebar.php'; ?>
        <div class="dashboard-content">
            <div class="content-header">
                <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
                <h2>Your Bookmarked Properties</h2>
            </div>

            <?php if (empty($bookmarks)): ?>
                <p>You have no bookmarked properties yet. You can add properties from the listing page.</p>
            <?php else: ?>
                <div class="property-grid" id="property-list">
                    <?php foreach ($bookmarks as $property): ?>
                        <div class="property-card" data-property-id="<?php echo $property['property_id']; ?>" data-images="<?php echo $property['images']; ?>" data-current-image-index="0">
                            <div class="image-container">
                                <button class="btn-property-type"><?php echo $property['status'] === 'for-rent' ? 'For Rent' : 'For Sale'; ?></button>
                                <button class="bookmark-btn bookmarked" data-property-id="<?php echo $property['property_id']; ?>">&#x2605;</button>
                                <img src="<?php echo explode(',', $property['images'])[0]; ?>" alt="Property Image">
                            </div>
                            <a href="property_detail.php?id=<?php echo $property['property_id']; ?>" class="property-info-link">
                                <div class="property-card-info">
                                    <p class="price">$<?php echo number_format($property['price']); ?></p>
                                    <p class="description"><?php echo htmlspecialchars($property['short_description']); ?></p>
                                    <p class="location">
                                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                                        <span><?php echo htmlspecialchars($property['location']); ?></span>
                                    </p>
                                    <div class="details">
                                        <div class="detail-item">
                                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                                            <span><?php echo $property['area']; ?> sqm</span>
                                        </div>
                                        <div class="detail-item">
                                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bedroom icon">
                                            <span><?php echo $property['bedrooms']; ?> Beds</span>
                                        </div>
                                        <div class="detail-item">
                                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon">
                                            <span><?php echo $property['bathrooms']; ?> Baths</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <script type="module" src="../scripts/listing.js"></script>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>