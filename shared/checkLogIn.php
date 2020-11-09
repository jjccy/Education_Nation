<?php
    if (!isset($_COOKIE['m_id'])) {
        echo '<script language="javascript">';
        echo "window.location.href='login.php';";
        echo '</script>';
    }

    if (!isset($_COOKIE['isTutor'])) {
        echo "<script>";
            echo "var current_url = window.location.pathname;";
            echo 'if (!(current_url.includes("account-settings") || current_url.includes("upcoming-booking") || current_url.includes("booking-history"))) {';
                echo "window.location.href='index.php';";
                echo "alert('Restricted, you do not have access!');";
            echo '}';
        echo "</script>";
    }
?>
