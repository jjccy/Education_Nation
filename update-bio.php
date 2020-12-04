<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Bio</title>
</head>
<body>
    <?php
        // checking if cancel has been pressed; if yes then returns back to about-me with no changes
        // if cancel wasn't then updating db with updated bio
        if (!isset($_POST['input-cancel']) || $_POST['input-cancel'] != "Cancel") {
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
            // change above step to session
            $currentUser = $_SESSION['m_id'];

            $connection = mysqli_connect("localhost", $_SESSION['email'] , $_SESSION['password'] , "terence_liu");

            if(mysqli_connect_errno()) {
            // if fail, skip all php and print errors

            die("Database connet failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno(). ")"
            );
            }

            $query = "SELECT tutor.bio FROM tutor WHERE tutor.tutor_id = '$currentUser'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('database query failed' . mysqli_error($result));
            }

            // storing updated bio as a variable if it is not empty
            if($_POST['updateBio'] != NULL){
                $updatedBio = $_POST['updateBio'];
                echo $updatedBio . "<br>";
            }

            // updated tutor's bio 
            if ($updatedBio != NULL) {
                $query = "UPDATE tutor SET bio = '$updatedBio' WHERE tutor.tutor_id = '$currentUser'";

                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die('database query failed update' . mysqli_connect_error());
                }
            }

            mysqli_close($connection);
        }

        // // alert box reject
        echo '<script language="javascript">';
        echo "window.location.href='tutor_about-me.php';";
        echo '</script>';
    ?>
</body>
</html>
