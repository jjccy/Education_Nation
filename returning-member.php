<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify</title>
  </head>
  <body>
    <?php
    //get the userinfo text file
    $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");
    // get the devider word between info
    $deviderFile = fopen("devider.txt", "r") or die("Unable to open file!");
    $devider = fgets($deviderFile);
    $devider = strtok($devider, "\n"); // remove new line from fgets
    fclose($deviderFile);
    $name = "";
    $email = "";
    $password= "";

    while (!feof($handle)) {
          $currentLine = fgets($handle);

          $user_data = explode($devider, strval($currentLine));
          $email = $user_data[0];
          $password = $user_data[1];
          $name = $user_data[2];

          if($email==$_POST['email-input']){
            if($password == $_POST['password-input']){
                //Login
                $login = true;
                // alert box welcome
                echo '<script language="javascript">';
                $welcome = "alert('Welcome, " . $name . "');";
                echo $welcome;
                echo "window.location.href='index.php';";
                echo '</script>';
                break;
              }
              else {
                // alert box reject
                echo '<script language="javascript">';
                echo 'alert("Incorrect Password and/or Email");';
                echo "window.location.href='login.php';";
                echo '</script>';
                break;
              }
            }
      }
        // alert box reject
        echo '<script language="javascript">';
        echo 'alert("Account Not Found");';
        echo "window.location.href='login.php';";
        echo '</script>';

      fclose($handle);

      ?>

  </body>
</html>
