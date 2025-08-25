<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/listing.css">
    <script src="../header_footer/header.js" defer></script>
</head>
<body>

    <?php
        include '../header_footer/header.php';
    ?>

    <section class="about-intro">
        <div class="text-container">
            <div class="intro-text">
                <span>Listing</span>
                <h1>Find What You Need.</h1>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section id="filters">
        <label for="propertyType">Property Type:</label>
        <select id="propertyType">
            <option value="all">All</option>
            <option value="apartment">Apartment</option>
            <option value="villa">Villa</option>
        </select>

        <label for="status">Status:</label>
        <select id="status">
            <option value="all">All</option>
            <option value="for-sale">For Sale</option>
            <option value="for-rent">For Rent</option>
        </select>

        <label for="bedroom">Bedroom:</label>
        <select id="bedroom">
            <option value="all">All</option>
            <option value="1bedroom">1 Bedroom</option>
            <option value="2bedroom">2 Bedroom</option>
            <option value="3bedroom">3 Bedroom</option>
            <option value="studio">Studio</option>
        </select>

        <label for="price" id="price-label" style="display: none;">Price:</label>
        <select id="price" style="display: none;">
            <!-- Options will be dynamically updated based on the status -->
        </select>

        <label for="location">Location:</label>
        <select id="location">
            <option value="all">All</option>
            <option value="Ayat">Ayat</option>
            <option value="CMC">CMC</option>
            <option value="Meri">Meri</option>
            <option value="Bole">Bole</option>
            <option value="Semit">Semit</option>
        </select>
    </section>

    <!-- Property Listing Grid -->
    <section id="property-list">
        <!-- Properties will be dynamically inserted here -->
    </section>

    <!-- Pagination Controls -->
    <div id="pagination">
        <button id="prev-btn">Previous</button>
        <button class="page-btn" data-page="1">1</button>
        <button class="page-btn" data-page="2">2</button>
        <button class="page-btn" data-page="3">3</button>
        <button id="next-btn">Next</button>
    </div>

    <script type="module" src="../scripts/listing.js"></script>
    <?php
        include '../header_footer/footer.php';
    ?>
</body>
</html>
