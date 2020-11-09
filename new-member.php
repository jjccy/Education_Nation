<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
  </head>
  <body>
    <?php


    // get user input
    $fname = $_POST['fname-input'];
    $lname = $_POST['lname-input'];
    $email = $_POST['email-input'];
    $password = $_POST['password-input'];
    $role = $_POST['role'];

    $duplicated = false;

    // get database
    $connection = mysqli_connect("localhost", "root", "", "terence_liu");

    if(mysqli_connect_errno()) {
      // if fail, skip all php and print errors

      die("Database connet failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno(). ")"
      );
    }

    $query = "SELECT member.email FROM member";

    // get result from database;
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('database query failed');
    }


    // check if email is duplicate
    while ($row = mysqli_fetch_array($result))
    {
      if ($email === $row[0]) { // password_verify the email
        $duplicated = true;
        echo '<script language="javascript">';
        echo 'alert("duplicate email");';
        echo '</script>';
        break;
      }
    }



    // if there is no existing email
    if (!$duplicated) {

      // hash email and password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // create query for new user
      $newUser = "INSERT INTO member (email, fname, lname, password)
      VALUES ('" . $email . "', '" . $fname . "', '" . $lname . "', '".  $hashedPassword . "')";

      $forForeignKey = "";

      // create new user and give them privilege
      $sql = "CREATE USER '" . $email . "'@'localhost' IDENTIFIED BY '" . $password . "';";
      if (!mysqli_query($connection, $sql)) {
        die ("create new user failed: " . mysqli_error($connection));
      }

      $sql = "GRANT ALL
      ON terence_liu.member
      TO '" . $email . "'@'localhost';";

      if (!mysqli_query($connection, $sql)) {
        die ("grant privilege failed: " . mysqli_error($connection));
      }

      // give all priviage on data
      $sql = "GRANT SELECT,INSERT,UPDATE
      ON terence_liu.*
      TO '" . $email . "'@'localhost';";
      if (!mysqli_query($connection, $sql)) {
        die ("Connection failed: " . mysqli_error($connection));
      }

      session_start();
      ini_set("session.gc_maxlifetime", 90 * 60);
      // check if is a tutor or student
      if ($role === "tutor") {
        // add access to tutor table
        // $sql = "GRANT ALL
        // ON terence_liu.tutor
        // TO '" . $email . "'@'localhost';";
        // if (!mysqli_query($connection, $sql)) {
        //   die ("Connection failed: " . mysqli_error($connection));
        // }

        $forForeignKey = "INSERT INTO tutor (tutor_id) VALUES(last_insert_id())";
        $_SESSION["isTutor"] = true;
      }
      else {
        // add access to student table
        // $sql = "GRANT ALL
        // ON terence_liu.student
        // TO '" . $email . "'@'localhost';";
        // if (!mysqli_query($connection, $sql)) {
        //   die ("Connection failed: " . mysqli_error($connection));
        // }
        //
        // // add access to review table
        // $sql = "GRANT ALL
        // ON terence_liu.review
        // TO '" . $email . "'@'localhost';";
        // if (!mysqli_query($connection, $sql)) {
        //   die ("Connection failed: " . mysqli_error($connection));
        // }

        $forForeignKey = "INSERT INTO student (student_id) VALUES(last_insert_id())";
        $_SESSION["isTutor"] = false;
      }

      // insert new user info into database
      if (mysqli_query($connection, $newUser) && mysqli_query($connection, $forForeignKey)) {
        // alert box welcome
        echo '<script language="javascript">';
        $welcome = "alert('Welcome, " . $fname . "');";
        echo $welcome;
        echo '</script>';

        // store user information in session
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $fname;
        $_SESSION["password"] = $password;

        // $getId = "SELECT member.m_id FROM member WHERE member.email=" . $email;
        // echo $getId ."<br>";
        // // $_SESSION['m_id'] = mysqli_fetch_array(mysqli_query($connection, $getId));
        // $getId = mysqli_query($connection, $getId);
        // if (!$getId) {
        //   die('getID failed: ' . mysqli_error($connection));
        // }

        // get result from database;
        $getId = mysqli_query($connection, "SELECT member.email, member.m_id FROM member");

        if (!$getId) {
          die('database query failed');
        }

        // check if email is duplicate
        while ($row = mysqli_fetch_array($getId))
        {
          if ($email === $row['email']) { // password_verify the email
            $_SESSION["m_id"] = $row['m_id'];
            break;
          }
        }

      }
      else {
        // alert box reject
        echo '<script language="javascript">';
        echo 'alert("fail to create new user");';
        echo '</script>';
        die("Connection failed: " . mysqli_error($connection));
      }

    }

    // release returned data
    mysqli_free_result($result);
    mysqli_close($connection);


    echo '<script language="javascript">';
    echo "window.location.href='index.php';";
    echo '</script>';

     ?>
  </body>
</html>
