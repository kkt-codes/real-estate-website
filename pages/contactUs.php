<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/contactUs.css">
    <script src="../scripts/contactUs.js" defer></script>
</head>
<body>

    <?php 
        include '../header_footer/header.php'; 
    ?>

    <section class="about-intro">
        <div class="text-container">
            <div class="intro-text">
                <span>Contact Us</span>
                <h1>Reach out to us!</h1>
            </div>
        </div>
    </section>

    <main class="container">
        <section class="contact-section">
            <!-- Form Container -->
            <div class="contact-container">
                <form action="#" method="POST" class="contact-form">
                    <h2>Get in Touch</h2>
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required placeholder="Eg. John Doe">

                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" pattern="\d{3}-\d{3}-\d{4}" placeholder="123-456-7890" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Eg. johndoe@example.com">

                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Eg. Project Inquiry">

                        <label for="message">Message</label>
                        <textarea id="message" name="message" cols="30" rows="6" required placeholder="Write your message here..."></textarea>

                        <input type="submit" value="Submit" class="btn">
                    </div>
                </form>
            </div>

            <!-- Contact Info Container -->
            <div class="info-container">
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <div class="info-box">
                        <h3>Our Offices</h3>
                        <p>
                            <strong>Head Office:</strong> 
                            <a href="#">123 Main Street, City, State, 56789</a>
                        </p>
                        <p>
                            <strong>Branches:</strong>
                        </p>
                        <ul>
                            <li><a href="#">456 Branch Street, City, State, 56789</a></li>
                            <li><a href="#">789 Another St, City, State, 56789</a></li>
                            <li><a href="#">101 Second Ave, City, State, 56789</a></li>
                        </ul>
                    </div>

                    <div class="info-box">
                        <h3>Find Us</h3>
                        <p><strong>Email:</strong> <a href="mailto:MKO@realestate.com">MKO@realestate.com</a></p>
                        <p><strong>Phone:</strong> <a href="tel:1234567890">(123) 456-7890</a></p>
                        <p><strong>Hours:</strong> Mon-Fri: 9am - 6pm</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Location Section -->
        <section class="map-section">
            <h2>Our Location</h2>
            <p>Visit our head office at the address below, or use the map to find the nearest branch.</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.369784062735!2d38.759457474498845!3d9.029991788974527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b844b428bd1d9%3A0x2439574d6dcdd0e0!2sHiLCoE%20School%20of%20Computer%20Science%20and%20Technology!5e0!3m2!1sen!2set!4v1739096352221!5m2!1sen!2set" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>

    <?php 
        include '../header_footer/footer.php'; 
    ?>

</body>
</html>
