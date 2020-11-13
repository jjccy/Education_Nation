<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Updating Account</title>
  </head>
  <body>
    <?php
        // check if session start has been called
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // initializing variables to see if these fields need to be updated
        // $updatefname = "false";
        // $updatelname = "false";
        // $updateemail = "false";
        // $updatepassword = "false";

        // change above step to session
        $currentUser = $_SESSION['m_id'];

        $connection = mysqli_connect("localhost", "login" , "" , "terence_liu");

        if(mysqli_connect_errno()) {
          // if fail, skip all php and print errors

          die("Database connect failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
          );
        }

        // retrieving the current user's row in the member table
        $query = "SELECT * FROM member WHERE member.m_id = '$currentUser'";
        // get result from database;

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('database query failed');
        }

        // storing the current user's information as variables
        while ($row = $result -> fetch_assoc()) {
            $firstName = $row['fname'];
            $lastName = $row['lname'];
            $email = $row['email'];
        }

        mysqli_free_result($result);

        // echo $firstName . "<br>" . $lastName . "<br>" . $email . "<br>";

        // retrieving updated user info and storing them as new variables;
        // checking if the input field is empty; if empty then use previous data; else use the updated info
        if($_POST['fname-edit'] != NULL && $firstName != $_POST['fname-edit']){
            $newFirstName = $_POST['fname-edit'];
            echo $newFirstName . "<br>";
        }

        if($_POST['lname-edit'] != NULL && $lastName != $_POST['lname-edit']){
            $newLastName = $_POST['lname-edit'];
            echo $newLastName . "<br>";
        }

        if($_POST['email-edit'] != NULL && $email != $_POST['email-edit']){
            $newEmail = $_POST['email-edit'];
        }

        if($_POST['password-edit-input'] != NULL){
            $newPassword = $_POST['password-edit-input'];
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // checking if new variables are created, if yes then update select information in the row
        if (isset($newFirstName)) {
          $query = "UPDATE member SET fname = '$newFirstName' WHERE member.m_id = '$currentUser'";
          $result = mysqli_query($connection, $query);

          if (!$result) {
              die('database query failed');
          }

          // updating session name
          else {
            // setcookie('name', $newFirstName);
            $_SESSION['name'] = $newFirstName;
          }
        }

        if (isset($newLastName)) {
          $query = "UPDATE member SET lname = '$newLastName' WHERE member.m_id = '$currentUser'";
          $result = mysqli_query($connection, $query);

          if (!$result) {
              die('database query failed');
          }
        }

        if (isset($newEmail)) {
          $query = "UPDATE member SET email = '$newEmail' WHERE member.m_id = '$currentUser'";
          $result = mysqli_query($connection, $query);

          if (!$result) {
              die('database query failed');
          }
          $_SESSION['email'] = $newEmail;
        }

        if (isset($newPassword)) {
          $query = "UPDATE member SET password = '$newPassword' WHERE member.m_id = '$currentUser'";
          $result = mysqli_query($connection, $query);

          if (!$result) {
              die('database query failed');
          }
          $_SESSION['password'] = $newPassword;
        }


        // drop old user account and create new one

        $sql = "DROP USER '" . $email . "'@'localhost';";
        if (!mysqli_query($connection, $sql)) {
          die ("create new user failed: " . mysqli_error($connection));
        }

        // create new user account
        $sql = "CREATE USER '" . $_SESSION['email'] . "'@'localhost' IDENTIFIED BY '" . $_SESSION['password'] . "';";
        if (!mysqli_query($connection, $sql)) {
          die ("create new user failed: " . mysqli_error($connection));
        }

        // give all priviage on data
        $sql = "GRANT SELECT,INSERT,UPDATE
        ON terence_liu.*
        TO '" . $_SESSION['email'] . "'@'localhost';";
        if (!mysqli_query($connection, $sql)) {
          die ("Connection failed: " . mysqli_error($connection));
        }

        mysqli_close($connection);

        // // alert box reject
        echo '<script language="javascript">';
        echo "window.location.href='account-settings.php';";
        echo '</script>';
      ?>

  </body>
</html>
