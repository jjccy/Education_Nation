<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify</title>
  </head>
  <body>
    <?php
    session_start();
    //get the userinfo text file
    $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");
    // get the devider word between info
    // $deviderFile = fopen("devider.txt", "r") or die("Unable to open file!");
    // $devider = fgets($deviderFile);
    // $devider = str_replace("\r\n","",$devider); // remove new line from fgets
    // fclose($deviderFile);
    $devider ='#KR#%5>DSG<)(E667)F?';


    while (!feof($handle)) {
          $currentLine = fgets($handle);

          echo $currentLine;

          $user_data = explode($devider, $currentLine);
          $email = $user_data[0];
          $password = $user_data[1];
          $name = $user_data[2];

          if($email==$_POST['email-input']){
            if($password == $_POST['password-input']){
                //Login

                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;

                fclose($handle);
                // alert box welcome
                echo '<script language="javascript">';
                $welcome = "alert('Welcome, " . $name . "');";
                echo $welcome;
                echo "window.location.href='index.php';";
                echo '</script>';

                // saving logged in user to .txt
                // $currentUser = fopen("currentUser.txt", "w") or die("Unable to open file!");
                // fwrite($currentUser, $name);
                // fclose($currentUser);
                break;
              }
              else {
                fclose($handle);
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
