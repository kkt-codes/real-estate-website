<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/property_detail.css">
</head>
<body>
    <?php include '../header_footer/header.php'; ?>

    <main class="property-detail-container">
        <section class="gallery-container">
            <div class="main-image-wrapper">
                <img id="main-image" src="" alt="Main property image">
            </div>
            <div class="thumbnail-wrapper" id="thumbnail-container">
                </div>
        </section>

        <section class="info-container">
            <div class="primary-info">
                <h1 id="property-location"></h1>
                <p class="price" id="property-price"></p>
                <div class="key-details">
                    <span id="property-bedrooms"></span> beds |
                    <span id="property-bathrooms"></span> baths |
                    <span id="property-area"></span> sqm
                </div>
            </div>
            <div class="actions">
                <button class="action-btn" id="bookmark-btn">&#x2606; Bookmark</button>
                <button class="action-btn primary" id="schedule-visit-btn">Schedule a Visit</button>
            </div>
        </section>

        <section class="description-section">
            <h2>About this property</h2>
            <p id="property-description"></p>
        </section>

        <section class="agent-section">
            <h2>Listed By</h2>
            <div class="agent-card">
                <div class="agent-info">
                    <h3 id="agent-name"></h3>
                    <p id="agent-email"></p>
                </div>
            </div>
        </section>

        <section id="appointment-form-section" class="appointment-section">
            <h2>Schedule a Visit</h2>
            <form action="../backend/appointment.php" method="POST">
                <input type="hidden" name="property_id" id="form-property-id">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="datetime-local" name="appointment_date" required>
                <textarea name="message" rows="4" placeholder="Your Message"></textarea>
                <button type="submit" class="btn primary">Submit Request</button>
            </form>
        </section>
    </main>

    <?php include '../header_footer/footer.php'; ?>
    <script src="../scripts/property_detail.js"></script>
    
    <script>
        const params = new URLSearchParams(window.location.search);
        if (params.get('appointment') === 'success') {
            alert('Your appointment has been successfully scheduled!');
        }
    </script>
</body>
</html>