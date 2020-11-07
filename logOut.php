<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log out</title>
  </head>
  <body>
    <?php

    // change login status to false;
    // $_COOKIE['loggedin'] = false;
    setcookie('loggedin', false, time() - 3600);


      // alert box exit
      echo '<script language="javascript">';
      echo 'alert("Log out successfully");';
      echo "window.location.href='index.php';";
      echo '</script>';

     ?>
  </body>
</html>
