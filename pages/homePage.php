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
                <select class="search-input">
                    <option value="" disabled selected>Property Type</option>
                    <option value="apt-sale">Apartment- For Sale</option>
                    <option value="apt-rent">Apartment- For Rent</option>
                    <option value="villa-sale">Villa- For Sale</option>
                    <option value="villa-rent">Villa- For Rent</option>
                </select>

                <select class="search-input">
                    <option value="" disabled selected>Location</option>
                    <option value="ayat">Ayat</option>
                    <option value="cmc">CMC</option>
                    <option value="meri">Meri</option>
                    <option value="bole">Bole</option>
                    <option value="kaliti">Semit</option>
                </select>

                <input type="text" class="search-input" placeholder="Max Price ($)">

                <span class="advanced-search">Advanced Search</span>

                <button class="search-btn">Search</button>
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
        <div class="properties-grid">
            <!-- 1st property START -->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Sale</button>
                    <img src="../assets/apartments/2Bedroom/II-2bedroom-rent/interior_2_bedroom_apartment.jpeg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$1,200,000</p>
                    <p class="description">Luxury apartment with modern amenities.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon"> 
                        <span>Bole, Addis Ababa</span>
                    </p>
                    
                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>2000 sqm</span>
                        </div>
                       
                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon"> 
                            <span>3 Beds</span>
                        </div>
                        
                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon"> 
                            <span>2 Baths</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- 1st property END -->

            <!-- 2nd property START -->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Rent</button>
                    <img src="../assets/villas/I-villa-rent/villa-frontView.jpeg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$3,000/month</p>
                    <p class="description">Spacious family house with a garden.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>Semit, Addis Ababa</span> 
                    </p>
                    
                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>2500 sqm</span>
                        </div>

                        <span class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon">
                            <span>4 Beds</span>
                        </span>

                        <span class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon">
                            <span>3 Baths</span>
                        </span>
                    </div>
                </div>
            </a>
            <!-- 2nd property END -->

            <!-- 3rd property START-->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Sale</button>
                    <img src="../assets/villas/IV-villa-sale/front_view_villa.jpg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$850,000</p>
                    <p class="description">Modern condo in a prime location.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>Ayat, Addis Ababa</span>
                    </p>

                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>1800 sqm</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon"> 
                            <span>2 beds</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon"> 
                            <span>2 Baths</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- 3rd property END -->

            <!-- 4th property START -->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Rent</button>
                    <img src="../assets/apartments/3Bedroom/II-3bedroom-rent/interior_3bedroom.jpeg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$2,500/month</p>
                    <p class="description">Cozy home in a quiet neighborhood.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>Kaliti, Addis Ababa</span>
                    </p>
                    
                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>2200 sqm</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon"> 
                            <span>3 Beds</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon"> 
                            <span>2 Baths</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- 4th property END -->

            <!-- 5th property START -->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Sale</button>
                    <img src="../assets/villas/V-villa-sale/villa_front_view.jpg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$950,000</p>
                    <p class="description">Elegant villa with a stunning view.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>Meri, Addis Ababa</span>
                    </p>
                    
                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>3000 sqm</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon" style="height: 30px"> 
                            <span>5 Beds</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon"> 
                            <span>4 Baths</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- 5th property END -->

            <!-- 6th property START-->
            <a href="#" class="property-card">
                <div class="image-container">
                    <button class="btn-property-type">For Rent</button>
                    <img src="../assets/apartments/1Bedroom/I-1bedroom-rent/1Bedroom_apartment_interior.jpeg" alt="Property Image">
                </div>
                <div class="property-info">
                    <p class="price">$4,000/month</p>
                    <p class="description">High-end penthouse with city skyline view.</p>
                    <p class="location">
                        <img src="../assets/icons/properties/location_on_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="location icon">
                        <span>CMC, Addis Ababa</span>
                    </p>

                    <div class="details">
                        <div class="detail-item">
                            <img src="../assets/icons/properties/area_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="area icon">
                            <span>150 sqm</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bed_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bed icon">
                            <span>4 Beds</span>
                        </div>

                        <div class="detail-item">
                            <img src="../assets/icons/properties/bathroom_24dp_000000_FILL0_wght300_GRAD0_opsz24.svg" alt="bathroom icon" style="height: 30px">
                            <span>3 Baths</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- 6th property END -->
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
            <a href="#" class="cta-button">
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