<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['m_id'])) {
        echo '<script language="javascript">';
        echo "window.location.href='sign-up.php';";
        echo '</script>';
    }

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
