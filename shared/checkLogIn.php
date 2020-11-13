<?php
    // check if session start has been called
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // checking if session is active, if not then return user to login page
    if (!isset($_SESSION['m_id'])) {
        echo '<script language="javascript">';
        echo "window.location.href='login.php';";
        echo '</script>';
    }

    // checking if user is tutor, if it is a student then block them from accessing the following pages
    if (!isset($_SESSION['isTutor']) || !$_SESSION['isTutor']) {
        echo "<script>";
            echo "var current_url = window.location.pathname;";
            echo 'if (!(current_url.includes("account-settings") || current_url.includes("upcoming-booking") || current_url.includes("booking-history"))) {';
                echo "window.location.href='index.php';";
                echo "alert('Restricted, you do not have access!');";
            echo '}';
        echo "</script>";
    }
?>
