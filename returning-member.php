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

    // get database using login privilege
    $connection = mysqli_connect("localhost", "login", "", "terence_liu");
    //Check if database connection was a success or not
    if(mysqli_connect_errno()) {
      // if fail, skip all php and print errors
      die("Database connect failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno(). ")"
      );
    }
    //retrieve email and password
    $query = "SELECT member.email, member.password, member.fname, member.lname, member.m_id FROM member WHERE member.email =" . "'". $email . "'";
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
          // check if is tutor
          $checker = mysqli_query($connection, "SELECT tutor.tutor_id FROM tutor WHERE tutor.tutor_id = " . "'". $row['m_id'] . "'");
          $isTutor = (1 == ($checker->num_rows));
          //save logged in status, email, name, and id to session
          //checkbox for keep me signed in is selected

          if(isset($_POST['signed-in'])){
            //do not delete cookies, and sign out only when logout is clicked
            // setcookie('loggedin', true);
            // setcookie('email', $email);
            // setcookie('name', $row['fname']);
            // setcookie('m_id', $row['m_id']);
            // setcookie('isTutor', $isTutor);
            ini_set("session.gc_maxlifetime", 60 * 60 * 24 * 30);
          }
          //checkbox for keep me signed in is not selected
          else{
            //delete cookies after 90 minutes, therefore signing out
            // setcookie('loggedin', true, time() + 5400);
            // setcookie('email', $email, time() + 5400);
            // setcookie('name', $row['fname'], time() + 5400);
            // setcookie('m_id', $row['m_id'], time() + 5400);
            // setcookie('isTutor', $isTutor, time() + 5400);
            ini_set("session.gc_maxlifetime", 90 * 60);

          }

          // starting session if it hasn't been started
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
          $_SESSION["loggedin"] = true;
          $_SESSION["email"] = $email;
          $_SESSION["name"] = $row['fname'];
          $_SESSION["isTutor"] = $isTutor;
          $_SESSION["m_id"] = $row['m_id'];
          $_SESSION["password"] = $password;
          $_SESSION['lname'] = $row['lname'];

          // release returned data
          mysqli_free_result($result);
          mysqli_close($connection);


          // provide alert that log in was successful
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
