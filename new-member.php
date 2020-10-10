<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <?php
    session_start();

    // get user input
    $name = explode(" ", $_POST['name-input']);
    $email = $_POST['email-input'];
    $password = $_POST['password-input'];

    $duplicated = false;

    // hardcode devider, will remove once use database
    $devider ='#KR#%5>DSG<)(E667)F?';

    // file stores all user info
    $userfile = fopen("userInfo.txt", "a+") or die("Unable to open file!");

    // check if email is duplicated
    while(!feof($userfile)) {
      $user = explode($devider, fgets($userfile));

      if ($user[0] == $email) {
        $duplicated = true;
        break;
      }
    }

    // if there is no existing email
    if (!$duplicated) {
      // format: email + devider + password + name[0] + devider + name[1] + devider + name[3] + ...
      $txt = $email . $devider . $password;

      foreach ($name as &$val) {
        $txt .= $devider . $val;
      }

      $txt .= "\n"; // add line break at the end

      fwrite($userfile, $txt);
      fclose($userfile);

      // store user information in session
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name[0];

      // alert box welcome
      echo '<script language="javascript">';
      $welcome = "alert('Welcome, " . $name[0] . "');";
      echo $welcome;
      echo "window.location.href='index.php';";
      echo '</script>';
    } else {
      // alert box reject
      echo '<script language="javascript">';
      echo 'alert("this email has already existed");';
      echo "window.location.href='sign-up.php';";
      echo '</script>';
    }

     ?>
  </body>
</html>
