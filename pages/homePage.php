<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/homePage.css">
    <!-- <link rel="stylesheet" href="../header_footer/header.css"> -->
    <script src="../header_footer/header.js" defer></script>
    <script src="../scripts/homePage.js" defer></script>
</head>
<body>

    <?php
        include '../header_footer/header.php';
    ?>

    <div id="overlay" onclick="closeSidebar()"></div>

    <!-- hero section START -->
    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Dream Home</h1>
            <p>Discover the best properties for sale and rent in your ideal location.</p>

            <div class="search-bar">
                <select class="search-input" id="hero-property-type">
                    <option value="all" selected>Property Type</option>
                    <option value="apartment">Apartment</option>
                    <option value="villa">Villa</option>
                </select>

                <select class="search-input" id="hero-location">
                    <option value="all" selected>Location</option>
                    <option value="Ayat">Ayat</option>
                    <option value="CMC">CMC</option>
                    <option value="Meri">Meri</option>
                    <option value="Bole">Bole</option>
                    <option value="Semit">Semit</option>
                </select>

                <input type="text" class="search-input" id="hero-max-price" placeholder="Max Price ($)">

                <span class="advanced-search">Advanced Search</span>

                <button class="search-btn" id="hero-search-btn">Search</button>
            </div>
        </div>
    </section>
    <!-- hero section END -->

    
    <!-- Property Types START -->
    <section class="property-types">
        <h2>Property Types</h2>
        <p>Explore different types of properties available.</p>
        <div class="property-types-grid">
            <!-- Apartment -->
            <div class="property-type-card">
                <div class="icon-container">
                    <img src="../assets/property-types/apartment.png" alt="Apartment">
                </div>
                <h3>Apartment</h3>
                <p>122 Properties</p>
            </div>
            
            <!-- Villa -->
            <div class="property-type-card">
                <div class="icon-container">
                    <img src="../assets/property-types/villa.png" alt="Villa">
                </div>
                <h3>Villa</h3>
                <p>98 Properties</p>
            </div>

            <!-- Condominium -->
            <div class="property-type-card">
                <div class="icon-container">
                    <img src="../assets/property-types/condominium.png" alt="Condominium">
                </div>
                <h3>Condominium</h3>
                <p>75 Properties</p>
            </div>

            <!-- Office -->
            <div class="property-type-card">
                <div class="icon-container">
                    <img src="../assets/property-types/office.png" alt="Office">
                </div>
                <h3>Office</h3>
                <p>50 Properties</p>
            </div>
        </div>
    </section>
    <!-- Property Types END -->


    <!-- Featured Properties START -->
    <section class="featured-properties">
        <h2>Featured Properties</h2>
        <p>Discover our top properties available for sale or rent.</p>
        <div class="properties-grid" id="featured-property-list">
        </div>
    </section>
    <!-- Featured Properties END -->


    <!-- Testimonials START -->
    <section class="testimonials">
        <h2>What Our Clients Say</h2>
        <p>Read the experiences of some of our satisfied customers.</p>
        <div class="testimonials-grid">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="testimonial-img">
                    <img src="../assets/testimonials/testimony-investor.png" alt="Client Image">
                </div>
                <p class="testimonial-quote">"I've partnered with MKO real-estate for multiple investments, and their expertise has consistently led to great returns."</p>
                <div class="testimonial-footer">
                    <p class="testimonial-name">John Smith</p>
                    <p class="testimonial-position">Real Estate Investor</p>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="testimonial-img">
                    <img src="../assets/testimonials/testimony-homeOwners.png" alt="Client Image">
                </div>
                <p class="testimonial-quote">"We couldn't be happier with our new home! The team made the buying process smooth and stress-free. They understood our needs and found the perfect place."</p>
                <div class="testimonial-footer">
                    <p class="testimonial-name">Mr & Mrs Toure</p>
                    <p class="testimonial-position">Homeowner</p>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="testimonial-img">
                    <img src="../assets/testimonials/testimony-firstTimeBuyer.png" alt="Client Image">
                </div>
                <p class="testimonial-quote">"I had a fantastic experience buying my first home! The team helped me through every step. Highly recommend!"</p>
                <div class="testimonial-footer">
                    <p class="testimonial-name">Yasin Abebe</p>
                    <p class="testimonial-position">First-Time Buyer</p>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="testimonial-card">
                <div class="testimonial-img">
                    <img src="../assets/testimonials/testimony-family.png" alt="Client Image">
                </div>
                <p class="testimonial-quote">"We couldn't be happier with the property we purchased. Great team!"</p>
                <div class="testimonial-footer">
                    <p class="testimonial-name">Tesfaye and family</p>
                    <p class="testimonial-position">Property Buyer</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials END -->


    <!-- Call To Action START -->
    <section class="cta-wrapper">
        <div class="cta-section">
            <div class="cta-content">
                <h2>Find Your Dream Home Today!</h2>
                <p>Browse our extensive listings and take the first step towards your new home.</p>
            </div>
            <a href="./listing.php" class="cta-button">
                <button>Get Started</button>
            </a>
        </div>
    </section>
     <!-- Call To Action END -->

    

    <?php
        include '../header_footer/footer.php';
    ?>
</body>
</html>