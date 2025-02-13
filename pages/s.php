<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Services</title>
    <link rel="stylesheet" href="s.css">
    <style>
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
<?php
        include '../header_footer/header.php';
    ?>

    
    <nav>
        <a href="#">
            <img src="MKO-logo-transparent-bg.png" alt="MyHome Logo" class="logo">
        </a>
        <ul class="nav-links">
            <li><a href="#">HOME</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#services">SERVICES</a></li>
            <li><a href="#">PROJECTS</a></li>
            <li><a href="#">PRICING</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <img src="5fd003b0-2824-47c2-bf36-8ac23bc2a590.png" alt="Gated Villas">
        <h2>Our Services</h2>
    </section>

    <!-- Services Section -->
    <section id="services">
        <h2>Services</h2>
        <div class="services-container">
            <a href="#buying" class="service-panel">
                <h3>Buying Home</h3>
                <p>Find your dream home with our expert guidance.</p>
            </a>
            <a href="#selling" class="service-panel">
                <h3>Selling Home</h3>
                <p>Get the best price for your property with our services.</p>
            </a>
            <a href="#renting" class="service-panel">
                <h3>Renting Home</h3>
                <p>Discover rental options that suit your needs.</p>
            </a>
            <a href="#investment" class="service-panel">
                <h3>Investment Properties</h3>
                <p>Invest wisely with our real estate market insights.</p>
            </a>
        </div>
    </section>
    

    <!-- Service Details -->
    <section id="buying" class="service-details">
        <h2>Buying a Home</h2>
        <img src="assets/villas/III-villa-sale/villa_front_view.jpeg" alt="Buying a Home">
        <p>Buying a home is a significant milestone, and we are dedicated to making the process as smooth as possible. Our team will help you find the perfect property, secure financing, and navigate legal procedures to ensure a hassle-free purchase. Whether you're a first-time buyer or an experienced investor, we're here to support you every step of the way.</p>
    </section>

    <section id="selling" class="service-details">
        <h2>Selling a Home</h2>
        <img src="assets/villas/IV-villa-sale/front_view_villa.jpg" alt="Selling a Home">
        <p>Selling your home can be overwhelming, but our experts make it easy. We provide professional market analysis, strategic marketing, and expert negotiations to help you get the best value for your property. From listing your home to closing the deal, we handle everything efficiently.</p>
    </section>

    <section id="renting" class="service-details">
        <h2>Renting a Home</h2>
        <img src="assets/villas/I-villa-rent/3rd_bedroom_rental_villa.jpg" alt="Renting a Home">
        <p>Finding the right rental property is crucial for comfort and convenience. We offer a diverse range of rental homes that match different budgets and preferences. Whether you're looking for a short-term lease or a long-term stay, we ensure a seamless rental experience.</p>
    </section>

    <section id="investment" class="service-details">
        <h2>Investment Properties</h2>
        <img src="assets/apartments/Outside_View/A_modern_apartments.jpeg" alt="Investment Properties">
        <p>Real estate is one of the best investment opportunities, and our team helps you make informed decisions. We provide expert insights on market trends, identify high-potential properties, and guide you through the investment process to ensure maximum returns.</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 MyHome. All Rights Reserved.</p>
    </footer>

</body>
</html>
