<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Services</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/servicesPage.css">

</head>
<body>
    <?php
        include '../header_footer/header.php';
    ?>
    <section class="about-intro">
        <div class="text-container">
            <div class="intro-text">
                <span>Services</span>
                <h1>Services - What Do We Offer?</h1>
            </div>
        </div>
    </section>

    <main>
        <!-- Hero Section -->
        <!-- <section class="hero">
        <img src="../assets/services/5fd003b0-2824-47c2-bf36-8ac23bc2a590.png" >
            <h2>Our Services</h2>
        </section> -->

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
            <img src="../assets/services/villa_front_view.jpeg" >
            <p>Buying a home is a significant milestone, and we are dedicated to making the process as smooth as possible. Our team will help you find the perfect property, secure financing, and navigate legal procedures to ensure a hassle-free purchase. Whether you're a first-time buyer or an experienced investor, we're here to support you every step of the way.</p>
        </section>

        <section id="selling" class="service-details">
            <h2>Selling a Home</h2>
            <img src="../assets/services/1029a9e8-2baa-49b4-bf20-17f253f38852.png" >
            <p>Selling your home can be overwhelming, but our experts make it easy. We provide professional market analysis, strategic marketing, and expert negotiations to help you get the best value for your property. From listing your home to closing the deal, we handle everything efficiently.</p>
        </section>

        <section id="renting" class="service-details">
            <h2>Renting a Home</h2>
            <img src="../assets/services/69b1ce5f-d606-432f-b928-bd85cd63eba0.png" >
            <p>Finding the right rental property is crucial for comfort and convenience. We offer a diverse range of rental homes that match different budgets and preferences. Whether you're looking for a short-term lease or a long-term stay, we ensure a seamless rental experience.</p>
        </section>

        <section id="investment" class="service-details">
            <h2>Investment Properties</h2>
            <img src="../assets/services/A_modern_apartments.jpeg" >
            <p>Real estate is one of the best investment opportunities, and our team helps you make informed decisions. We provide expert insights on market trends, identify high-potential properties, and guide you through the investment process to ensure maximum returns.</p>
        </section>
    </main>
    <!-- Footer -->
    <?php
        include '../header_footer/footer.php';
    ?>

</body>
</html>
