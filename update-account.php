<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Updating Account</title>
  </head>
  <body>
    <?php
        session_start();

        $updatefname = "false";
        $updatelname = "false";
        $updateemail = "false";
        $updatepassword = "false";

        // change above step to session
        $currentUser = $_SESSION['name'];

        $connection = mysqli_connect("localhost", "root", "", "terence_liu");

        if(mysqli_connect_errno()) {
          // if fail, skip all php and print errors

          die("Database connet failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
          );
        }

        $query = "SELECT * FROM member WHERE member.fname = '$currentUser'";
        // get result from database;

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('database query failed');
        }

        while ($row = $result -> fetch_assoc()) {
            $firstName = $row['fname'];
            $lastName = $row['lname'];
            $email = $row['email'];
            
            // echo $firstName . "<br>" . $lastName . "<br>" . $email;


            // retrieving updated user info and storing them as new variables;
            // checking if the input field is empty; if empty then use previous data; else use the updated info
            if($_POST['fname-edit'] != NULL && $firstName != $_POST['fname-edit']){
                $updatefname = "true";
                $query = "UPDATE member SET fname = '$firstName' WHERE member.fname= '$currentUser'";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die('database query failed');
                }
            }

            if($_POST['lname-edit'] != NULL && $lastName != $_POST['lname-edit']){
                $newLastName = $_POST['lname-edit'];
            }

            if($_POST['email-edit'] != NULL && $email != $_POST['email-edit']){
                $newEmail = $_POST['email-edit'];
            }

            // if($_POST['password-edit-input'] != NULL && $password != $_POST['password-edit-input']){
            //     $newPassword = $_POST['password-edit-input'];
            // }

        }

        // if ($updatefname == "true") {
        //     $query = "UPDATE member SET fname = '$firstName' WHERE member.fname= '$currentUser'";
        //     $result = mysqli_query($connection, $query);

        //     if (!$result) {
        //         die('database query failed');
        //     }
        // }

        mysqli_free_result($result);
        mysqli_close($connection);

        // // alert box reject
        // echo '<script language="javascript">';
        // echo "window.location.href='index.php';";
        // echo '</script>';
      ?>

  </body>
</html>
