<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify</title>
  </head>
  <body>
    <?php
    // get user input
    $email = $_POST['email-input'];
    $password = $_POST['password-input'];
    $keepMeSignedIn = $_POST['signed-in'];

    // get database
    $connection = mysqli_connect("localhost", $email, $password, "terence_liu");
    //Check if database connection was a success or not
    if(mysqli_connect_errno()) {
      // if fail, skip all php and print errors

      die("Database connect failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno(). ")"
      );
    }
    //retrieve email and password
    $query = "SELECT member.email, member.password, member.fname, member.m_id FROM member WHERE member.email =" . "'". $email . "'";
    $result = mysqli_query($connection, $query);

    //check if query results is empty or not
    if (!$result) {
      die('database query failed');
    }
    else{
      while ($row = $result -> fetch_assoc()) {
        //if email exists but password is incorrect
        if($row['email']==$email && !password_verify($password, $row['password'])){
          //alert box reject
          echo '<script language="javascript">';
          echo 'alert("Email and/or Password is incorrect");';
          echo "window.location.href='login.php';";
          echo '</script>';
        }
        //if email exists and password is correct
        else if ($row['email']==$email && password_verify($password, $row['password'])) {
          //save logged in status, email, name, and id to session
          //checkbox for keep me signed in is selected
          if(isset($keepMeSignedIn)){
            //do not delete cookies, and sign out only when logout is clicked
            setcookie('loggedin', true);
            setcookie('email', $email);
            setcookie('name', $row['fname']);
            setcookie('m_id', $row['m_id']);

          }
          //checkbox for keep me signed in is not selected
          else{
            //delete cookies after 90 minutes, therefore signing out
            setcookie('loggedin', true, time() + 5400, "/");
            setcookie('email', $email, time() + 5400, "/");
            setcookie('name', $row['fname'], time() + 5400, "/");
            setcookie('m_id', $row['m_id'], time() + 5400, "/");
          }

          // release returned data
          mysqli_free_result($result);
          mysqli_close($connection);


          //provide alert that log in was successful
          echo '<script language="javascript">';
          $welcome = "alert('Welcome, " . $row['fname'] . "');";
          echo $welcome;
          echo "window.location.href='index.php';";
          echo '</script>';
        }
      }
    }

    // release returned data
    mysqli_free_result($result);
    mysqli_close($connection);

      // alert box reject
    echo '<script language="javascript">';
    echo 'alert("Account Not Found");';
    echo "window.location.href='login.php';";
    echo '</script>';

    ?>

  </body>
</html>
