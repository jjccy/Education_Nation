<?php
    if (!isset($_SESSION['m_id'])) {
        echo '<script language="javascript">';
        echo "window.location.href='sign-up.php';";
        echo '</script>';
    }
?>
