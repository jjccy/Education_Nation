<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify</title>
  </head>
  <body>
    <?php
    $usersFile = 'userInfo.txt';
    $usersList = file_get_contents($usersFile);
    // get the devider word between info
    $deviderFile = fopen("devider.txt", "r") or die("Unable to open file!");
    $devider = fgets($deviderFile);
    $devider = strtok($devider, "\n"); // remove new line from fgets
    fclose($deviderFile);
    $usersList = explode($devider, $usersList);
    $name = "";
    $email = "";
    $password= "";
    $length = count($usersList);

//     foreach($usersList as &$user){
//       echo $user;
//       echo "<br>";
// }

    // for ($i=0; $i<$length-3;$i=$i+4){
    foreach($usersList as &$user){
     $loginInfo = $user;
     echo $loginInfo;
        // $email = $loginInfo[$i];
        // $password = $loginInfo[$i+1];
        // $name = $loginInfo[$i+2];

        // if($email==$_POST['email-input']){
        //   if($password == $_POST['password-input']){
        //       //Login
        //       $login = true;
        //       // alert box welcome
        //       echo '<script language="javascript">';
        //       $welcome = "alert('Welcome, " . $name . "');";
        //       echo $welcome;
        //       echo "window.location.href='index.php';";
        //       echo '</script>';
        //     }
        //     elseif ($password != $_POST['password-input']) {
        //       // alert box reject
        //       echo '<script language="javascript">';
        //       echo 'alert("Incorrect Password and/or Email");';
        //       echo "window.location.href='login.php';";
        //       echo '</script>';
        //     }
        //   }
        //   else{
        //     // alert box reject
        //     echo '<script language="javascript">';
        //     echo 'alert("Account Not Found");';
        //     echo "window.location.href='login.php';";
        //     echo '</script>';
        //   }
    }




      ?>
      <?php
    //     $handle = fopen("theo-testing.txt", "r") or die("Unable to open file!");
    //     $devider_file = fopen("devider.txt", "r") or die("Unable to open file!");
    //     $currentUser = "Terence";
    //
    //     while (!feof($devider_file)) {
    //         $d = fgets($devider_file);
    //     }
    //
    //     while (!feof($handle)) {
    //         // echo fgets($handle) . "<br>";
    //         $currentLine = fgets($handle);
    //         // echo $currentLine . "<br>";
    //
    //         // echo $d;
    //
    //         $user_data = explode(strval($d), strval($currentLine));
    //         echo $user_data[0] . "<br>";
    //     }
    //
    //     fclose($handle);
    //     fclose($devider_file);
    // ?>
  </body>
</html>
