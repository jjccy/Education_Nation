<?php
    if (!isset($_COOKIE['m_id'])) {
        echo '<script language="javascript">';
        echo "window.location.href='login.php';";
        echo '</script>';
    }
?>