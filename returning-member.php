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
    $email = "";
    $password= "";

    foreach($usersList as $user){
     $loginInfo = $user;
        $email = $loginInfo[0];
        $password = $loginInfo[1];

    if($email == $_POST['email-input'] && $password == $_POST['password-input']){
        //Login
        $login = true;
      }
    }
    if ($email == $_POST['email-input'] && $password != $_POST['password-input']) {
      echo '<script>alert("Account Not Found");</script>';
    }
    else{
     echo '<script>alert("Incorrect Email or Password.");</script>';

    }

     ?>
  </body>
</html>
