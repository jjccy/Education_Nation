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
        $currentUser = $_SESSION['m_id'];

        $connection = mysqli_connect("localhost", "root", "", "terence_liu");

        if(mysqli_connect_errno()) {
            // if fail, skip all php and print errors

            die("Database connet failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
            );
        }

        $query = "SELECT * FROM course WHERE course.tutor_id = '$currentUser'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Database connect failed" .  mysqli_error($connection));
        }

        if(isset($_POST['subject-create'])){
            $subject = $_POST['subject-create'];
            echo $subject . "<br>";
        }

        if(isset($_POST['wage-create'])){
            $wage = $_POST['wage-create'];
            echo $wage . "<br>";
        }

        if(isset($_POST['min-age-create'])){
            $minGrade = $_POST['min-age-create'];

            if ($_POST['min-age-create'] == "K" || $_POST['min-age-create'] == "k") {
                $minGrade = 0;
            }
            echo $minGrade . "<br>";
        }

        if(isset($_POST['max-age-create'])){
            $maxGrade = $_POST['max-age-create'];

            echo $maxGrade . "<br>";
        }

        if (!($minGrade >= 0 && $maxGrade <= 12)) {
            echo '<script language="javascript">';
            echo "window.location.href='tutor_courses.php';";
            echo 'alert("Grade Range Out of Bounds");';
            echo '</script>';
            mysqli_free_result($result);
            mysqli_close($connection);
        }


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

        mysqli_free_result($result);

        $query = "INSERT INTO course (tutor_id, price, subject_name, min_grade, max_grade) VALUES ('$currentUser', '$wage', '$subject', '$minGrade', '$maxGrade')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Database connect failed" .  mysqli_error($connection));
        }

        mysqli_close($connection);

        echo '<script language="javascript">';
        echo "window.location.href='tutor_courses.php';";
        echo '</script>';
    ?>
</body>
</html>
