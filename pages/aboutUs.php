<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/aboutUs.css">
    <script src="../header_footer/header.js" defer></script>
    <script src="../scripts/aboutUs.js" defer></script>
</head>
<body>

    <?php include '../header_footer/header.php'; ?>

    <section class="about-intro">
        <div class="text-container">
            <div class="intro-text">
                <span>About Us</span>
                <h1>Your Trusted Partner in Real Estate</h1>
            </div>
        </div>
    </section>

    <main class="about-container">

        <section class="our-story">
            <div class="story-image">
                <img src="../assets/apartments/Outside_View/coming_soon.jpeg" alt="Building under construction">
            </div>
            <div class="story-content">
                <h2>Our Story</h2>
                <p>MKO Real Estate was founded with a simple mission: to provide exceptional service and expert guidance in the real estate market. Our journey began with a small team of passionate professionals who believed in transparency, integrity, and client-centricity. Over the years, we have grown into a leading real estate firm, known for our commitment to helping clients achieve their property goals.</p>
                <p>We believe that buying or selling a home is more than just a transaction; it's a life-changing experience. That's why we are dedicated to providing personalized service, tailored to meet the unique needs of each client. Our team of experienced agents is here to support you every step of the way, from initial consultation to closing the deal.</p>
            </div>
        </section>

        <section class="why-choose-us">
            <h2>Why Choose Us?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <img src="../assets/aboutUs/buildingIcon.jpg" alt="Building Icon" class="feature-icon">
                    <h3>Wide Range of Properties</h3>
                    <p>We offer a diverse portfolio of properties, from cozy apartments to luxurious villas, ensuring you find the perfect match for your needs.</p>
                </div>
                <div class="feature-card">
                    <img src="../assets/aboutUs/employee.jpg" alt="Employee Icon" class="feature-icon">
                    <h3>Experienced Agents</h3>
                    <p>Our team of highly skilled and knowledgeable agents is dedicated to providing you with the best advice and guidance throughout your journey.</p>
                </div>
                <div class="feature-card">
                    <img src="../assets/aboutUs/calanderIcon.jpg" alt="Calendar Icon" class="feature-icon">
                    <h3>Transparent Process</h3>
                    <p>We believe in honesty and transparency. We keep you informed at every stage of the process, so you can make confident decisions.</p>
                </div>
                <div class="feature-card">
                    <img src="../assets/aboutUs/location.jpg" alt="Location Icon" class="feature-icon">
                    <h3>Local Market Expertise</h3>
                    <p>With our deep understanding of the local market, we can help you find the best deals and opportunities in the most sought-after locations.</p>
                </div>
            </div>
        </section>

        <section class="faq-section">
            <div class="faq-content">
                <h2>Frequently Asked Questions</h2>
                <p>Have questions? We've got answers. Here are some of the most common questions we receive from our clients. If you don't find what you're looking for, feel free to contact us directly.</p>
            </div>
            <div class="faq-accordion">
                <div class="faq-item">
                    <button class="faq-question">
                        <span>How do I start the process of buying a home?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>The first step is to get pre-approved for a mortgage. This will give you a clear idea of your budget and help you narrow down your search. Once you're pre-approved, you can start looking at properties with one of our expert agents.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>What is the best time to sell my property?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>The best time to sell depends on various factors, including market conditions and your personal circumstances. Generally, spring and fall are popular times for real estate transactions. Our agents can provide a detailed market analysis to help you decide.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>How long does the closing process take?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>The closing process typically takes between 30 to 45 days, from the time your offer is accepted to the final closing date. This can vary depending on the complexity of the transaction and financing arrangements.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include '../header_footer/footer.php'; ?>

</body>
</html>