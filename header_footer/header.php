<?php
session_start();
?>
<link rel="stylesheet" href="../header_footer/header.css">
<script src="../header_footer/header.js" defer></script>
<header>
    <nav class="navbar">
        <div class="navbar-inner">
            <button class="hamburger-menu">
                <img src="../assets/icons/navbar/menu_24dp_000000_FILL0_wght200_GRAD0_opsz24.svg" alt="">
            </button>
            <!-- 1st container -->
            <div class="nav-logo-img">
                <img src="../assets/MKO-company-images/MKO-logo-transparent-bg.png" alt="A logo of MKO Real Estate Company">
            </div>
    
            <!-- 2nd container -->
            <ul class="nav-list sidebar">
                <li>
                    <button class="close-sidebar-button">
                        <img src="../assets/icons/navbar/close_24dp_000000_FILL0_wght200_GRAD0_opsz24.svg" alt="">
                    </button>
                </li>
                <li class="nav-item">
                    <a href="../pages/homePage.php" class="link">
                        <span class="title">Home</span>    
                    </a>
                </li>
    
                <li class="nav-item">
                    <a href="#" class="link">
                        <span class="title">Listing</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class = "sub-menu">
                        <li><a href="../pages/listing.php?status=for-sale">Sales</a></li>
                        <li><a href="../pages/listing.php?status=for-rent">Rental</a></li>
                    </ul>
                </li>
    
                <li class="nav-item">
                    <a href="../pages/servicesPage.php" class="link">
                        <span class="title">Services</span>    
                    </a>
                </li>
    
                <li class="nav-item">
                    <a href="#" class="link">
                        <span class="title">About</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class = "sub-menu">
                        <li><a href="../pages/aboutUs.php">About Us</a></li>
                        <li><a href="../pages/conditionPage.php">Terms and Conditions</a></li>
                    </ul>
                </li>
    
                <li class="nav-item">
                    <a href="../pages/contactUs.php" class="link">
                        <span class="title">Contact Us</span>
                    </a>
                </li>
    
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo ($_SESSION['user_type'] === 'agent') ? '../pages/agent_dashboard.php' : '../pages/customer_dashboard.php'; ?>" class="link">
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
    
            <!-- 3rd container -->
            <div class="btn-container">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button class = "btn-login">
                        <span><img src="../assets/icons/navbar/logout_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="A logout button"></span>
                        <a href="../backend/logout.php">Log Out</a>
                    </button>
                <?php else: ?>
                    <button class = "btn-login">
                        <span><img src="../assets/icons/navbar/login_24dp_FFF_FILL1_wght400_GRAD0_opsz24.svg" alt="A login button"></span>
                        <a href="../pages/loginPage.php">Sign In</a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>