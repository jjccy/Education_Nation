<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log out</title>
  </head>
  <body>
    <?php
    session_start();

    $_SESSION['loggedin'] = false;


      // alert box exit
      echo '<script language="javascript">';
      echo 'alert("Log out successfully");';
      echo "window.location.href='index.php';";
      echo '</script>';


     ?>
  </body>
</html>
