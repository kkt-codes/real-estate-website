<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="dashboard-sidebar">
    <div class="sidebar-header">
        <h2>Dashboard</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <?php if ($_SESSION['user_type'] === 'agent'): ?>
                <li>
                    <a href="agent_dashboard.php" class="<?php echo ($current_page == 'agent_dashboard.php') ? 'active' : ''; ?>">
                        <img src="../assets/icons/dashboard/dashboard_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Dashboard Icon">
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li>
                    <a href="add_property.php" class="<?php echo ($current_page == 'add_property.php') ? 'active' : ''; ?>">
                        <img src="../assets/icons/dashboard/add_circle_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Add Property Icon">
                        <span>Add Property</span>
                    </a>
                </li>
                <li>
                    <a href="agent_transactions.php" class="<?php echo ($current_page == 'agent_transactions.php') ? 'active' : ''; ?>">
                        <img src="../assets/icons/dashboard/contract_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Transactions Icon">
                        <span>Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="agent_appointments.php" class="<?php echo ($current_page == 'agent_appointments.php') ? 'active' : ''; ?>">
                         <img src="../assets/icons/dashboard/calendar_month_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Appointments Icon">
                        <span>Appointments</span>
                    </a>
                </li>
            <?php else: // Customer Links ?>
                <li>
                    <a href="customer_dashboard.php" class="<?php echo ($current_page == 'customer_dashboard.php') ? 'active' : ''; ?>">
                        <img src="../assets/icons/dashboard/dashboard_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Dashboard Icon">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customer_appointments.php" class="<?php echo ($current_page == 'customer_appointments.php') ? 'active' : ''; ?>">
                        <img src="../assets/icons/dashboard/calendar_month_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Appointments Icon">
                        <span>My Appointments</span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="../backend/logout.php">
                    <img src="../assets/icons/navbar/logout_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Logout Icon">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>