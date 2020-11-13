<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Course</title>
</head>
<body>
    <?php
        // change above step to session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //Get the current member's id from session
        $currentUser = $_SESSION['m_id'];
        //Connect to the database
        $connection = mysqli_connect("localhost", $_SESSION['email'] , $_SESSION['password'] , "terence_liu");

        if(mysqli_connect_errno()) {
            // if fail, skip all php and print errors

            die("Database connet failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
            );
        }
        // Query to check get the tutor's current id
        $query = "SELECT * FROM course WHERE course.tutor_id = '$currentUser'";
        $result = mysqli_query($connection, $query);
        //if query fails die
        if (!$result) {
            die("Database connect failed" .  mysqli_error($connection));
        }
        //if input field subject-create is filled set subject to equal subject-create
        if(isset($_POST['subject-create'])){
            $subject = $_POST['subject-create'];
            echo $subject . "<br>";
        }
        //if input field wage-create is filled set subject to equal wage-create
        if(isset($_POST['wage-create'])){
            $wage = $_POST['wage-create'];
            echo $wage . "<br>";
        }
        //if input field min-age-create is filled set subject to equal min-age-create
        if(isset($_POST['min-age-create'])){
            $minGrade = $_POST['min-age-create'];
            //Convert input of "K" or "k" to equal 0
            if ($_POST['min-age-create'] == "K" || $_POST['min-age-create'] == "k") {
                $minGrade = 0;
            }
            echo $minGrade . "<br>";
        }
        //if input field max-age-create is filled set subject to equal max-age-create
        if(isset($_POST['max-age-create'])){
            $maxGrade = $_POST['max-age-create'];

            echo $maxGrade . "<br>";
        }
        //Check to see that minGrade is greater or equal to 0 and less than or equal to 12, otherwise alert tutor of the error
        if (!($minGrade >= 0 && $maxGrade <= 12)) {
            echo '<script language="javascript">';
            echo "window.location.href='tutor_courses.php';";
            echo 'alert("Grade Range Out of Bounds");';
            echo '</script>';
            mysqli_free_result($result);
            mysqli_close($connection);
        }

        //Check to see if the course already exists or not, if so alert tutors of the error
        while ($row = $result -> fetch_assoc()) {
            if ($row['subject_name'] == $subject) {
                if ($row['min_grade'] == $minGrade) {
                    if ($row['max_grade'] == $maxGrade) {
                        if ($row['price'] == $wage) {
                            echo '<script language="javascript">';
                            echo "window.location.href='tutor_courses.php';";
                            echo 'alert("Course Already Exists");';
                            echo '</script>';
                            mysqli_free_result($result);
                            mysqli_close($connection);
                        }
                    }
                }
            }
        }
        //Free query results
        mysqli_free_result($result);

        //Insert the new course once all the previous conditions are fulfilled
        $query = "INSERT INTO course (tutor_id, price, subject_name, min_grade, max_grade) VALUES ('$currentUser', '$wage', '$subject', '$minGrade', '$maxGrade')";
        $result = mysqli_query($connection, $query);
        //If insert query fails die
        if (!$result) {
            die("Database connect failed" .  mysqli_error($connection));
        }
        //Close database connection
        mysqli_close($connection);
        //once completed return to tutor_courses.php
        echo '<script language="javascript">';
        echo "window.location.href='tutor_courses.php';";
        echo '</script>';
    ?>
</body>
</html>
