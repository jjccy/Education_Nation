<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log out</title>
  </head>
  <body>
    <?php

    // check if there is currently a session or not, if not start one
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // destroy the session
    session_destroy();


      // alert box exit
      echo '<script language="javascript">';
      echo 'alert("Log out successfully");';
      echo "window.location.href='index.php';";
      echo '</script>';

     ?>
  </body>
</html>
