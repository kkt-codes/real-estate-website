<?php
if (isset($_SESSION['success_message']) || isset($_SESSION['error_message'])) {
    echo '<script>';
    if (isset($_SESSION['success_message'])) {
        echo "alert('" . addslashes($_SESSION['success_message']) . "');";
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo "alert('" . addslashes($_SESSION['error_message']) . "');";
        unset($_SESSION['error_message']);
    }
    echo '</script>';
}
?>