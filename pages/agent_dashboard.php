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

// Fetch agent's properties that are still available
$stmt = $pdo->prepare("SELECT * FROM properties WHERE agent_id = ? AND (status = 'for-sale' OR status = 'for-rent')");
$stmt->execute([$user_id]);
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch total transactions
$stmt = $pdo->prepare("SELECT COUNT(*) FROM transactions WHERE agent_id = ?");
$stmt->execute([$user_id]);
$total_transactions = $stmt->fetchColumn();

// Fetch upcoming appointments
$stmt = $pdo->prepare("SELECT COUNT(*) FROM appointments a JOIN properties p ON a.property_id = p.property_id WHERE p.agent_id = ? AND a.appointment_date >= CURDATE()");
$stmt->execute([$user_id]);
$upcoming_appointments = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
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
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <h2><?php echo count($properties); ?></h2>
                    <p>Properties Listed</p>
                </div>
                <div class="summary-card">
                    <h2><?php echo $total_transactions; ?></h2>
                    <p>Total Transactions</p>
                </div>
                <div class="summary-card">
                    <h2><?php echo $upcoming_appointments; ?></h2>
                    <p>Upcoming Appointments</p>
                </div>
            </div>

            <div class="content-header" style="margin-top: 30px;">
                <h2>Your Properties</h2>
            </div>

            <div class="property-grid">
                <?php foreach ($properties as $property): ?>
                    <div class="property-card" data-property-id="<?php echo $property['property_id']; ?>" data-price="<?php echo $property['price']; ?>" data-status="<?php echo $property['status']; ?>">
                        <div class="image-container">
                            <a href="property_detail.php?id=<?php echo $property['property_id']; ?>" class="property-link">
                                <img src="<?php echo explode(',', $property['images'])[0]; ?>" alt="Property Image">
                            </a>
                            <div class="property-card-actions">
                                <button class="edit-btn"><img src="../assets/icons/dashboard/edit_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Edit"></button>
                                <form action="../backend/delete_property.php?id=<?php echo $property['property_id']; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                    <button type="submit" class="delete-btn">
                                        <img src="../assets/icons/dashboard/delete_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Delete">
                                    </button>
                                </form>
                                <button class="complete-transaction-btn"><img src="../assets/icons/dashboard/price_check_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Complete Transaction"></button>
                            </div>
                        </div>
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
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Edit Property</h2>
            <form id="edit-form" action="" method="POST">
                </form>
        </div>
    </div>

    <div id="transaction-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Complete Transaction</h2>
            <form id="transaction-form" action="../backend/complete_transaction.php" method="POST">
                <input type="hidden" name="property_id" id="transaction-property-id">
                <input type="hidden" name="transaction_type" id="transaction-type">
                <div class="form-group">
                    <label for="final_amount">Final Amount ($):</label>
                    <input type="number" name="final_amount" id="final-amount" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Complete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('edit-modal');
        const transactionModal = document.getElementById('transaction-modal');
        const closeButtons = document.querySelectorAll('.close-button');

        // Edit Modal Logic
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const propertyCard = this.closest('.property-card');
                const propertyId = propertyCard.dataset.propertyId;

                fetch(`../backend/get_property_details.php?id=${propertyId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                            return;
                        }
                        
                        const editForm = document.getElementById('edit-form');
                        editForm.action = `../backend/edit_property.php?id=${propertyId}`;
                        editForm.innerHTML = `
                            <input type="hidden" name="property_id" value="${data.property_id}">
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" name="location" value="${data.location}" required>
                            </div>
                            <div class="form-group">
                                <label for="area">Area (sq ft):</label>
                                <input type="number" name="area" value="${data.area}" required>
                            </div>
                            <div class="form-group">
                                <label for="bedrooms">Bedrooms:</label>
                                <input type="number" name="bedrooms" value="${data.bedrooms}" required>
                            </div>
                             <div class="form-group">
                                <label for="bathrooms">Bathrooms:</label>
                                <input type="number" name="bathrooms" value="${data.bathrooms}" required>
                            </div>
                             <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" name="price" value="${data.price}" required>
                            </div>
                            <div class="form-group">
                                <label for="images">Images (comma-separated URLs):</label>
                                <textarea name="images" rows="4">${data.images.join(', ')}</textarea>
                            </div>
                            <div class="form-actions">
                                <button type="submit">Save Changes</button>
                            </div>
                        `;
                        editModal.style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching property details:', error));
            });
        });

        // Transaction Modal Logic
        document.querySelectorAll('.complete-transaction-btn').forEach(button => {
            button.addEventListener('click', function() {
                const propertyCard = this.closest('.property-card');
                const propertyId = propertyCard.dataset.propertyId;
                const price = propertyCard.dataset.price;
                const status = propertyCard.dataset.status;

                document.getElementById('transaction-property-id').value = propertyId;
                document.getElementById('final-amount').value = price;
                document.getElementById('transaction-type').value = (status === 'for-sale') ? 'sale' : 'rent';
                
                transactionModal.style.display = 'block';
            });
        });

        // Close modal functionality
        closeButtons.forEach(button => {
            button.onclick = function() {
                editModal.style.display = 'none';
                transactionModal.style.display = 'none';
            }
        });

        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = 'none';
            }
            if (event.target == transactionModal) {
                transactionModal.style.display = 'none';
            }
        }
    });

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