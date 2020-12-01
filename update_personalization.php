<?php
    // check if session start has been called
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // change above step to session
    $currentUser = $_SESSION['m_id'];

    $connection = mysqli_connect("localhost", $_SESSION['email'], $_SESSION['password'], "terence_liu");

    if(mysqli_connect_errno()) {
        // if fail, skip all php and print errors

        die("Database connect failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno(). ")"
        );
    }

    $query = "SELECT * FROM personalization WHERE personalization.student_id = '$currentUser'";
    // get result from database;

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('database query failed');
    }

    while ($row = $result -> fetch_assoc()) {
        $grade = $row['grade'];
        $city = $row['city'];
        $courses = $row['courses'];
        $lang = $row['lang'];

        echo $grade . "hi <br>";
        echo $city . "hi <br>";
        echo $courses . "hi <br>";
        echo $lang . "hi <br>";
    }

    // grade, city, or courses is not set then run this
    // insert row into table
    if (!isset($grade) || !isset($city) || !isset($courses) || !isset($lang)) {
        if($_POST['subject-edit'] != NULL){
            $courses = $_POST['subject-edit'];
            echo $courses . "<br>";
        }
    
        if($_POST['grade-edit'] != NULL){
            $grade = $_POST['grade-edit'];
            echo $grade . "<br>";
        }
    
        if($_POST['language-edit'] != NULL){
            $lang = $_POST['language-edit'];
            echo $lang . "<br>";
        }
    
        if($_POST['location-edit'] != NULL){
            $city = $_POST['location-edit'];
            echo $city . "<br>";
        }

        $query = "INSERT INTO personalization (student_id, grade, city, courses, lang) VALUES ($currentUser, $grade, '$city', '$courses', '$lang')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Database connect failed insert: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
            );
        }
    }

    // update table
    else {
        if($_POST['subject-edit'] != NULL){
            $courses = $_POST['subject-edit'];
            echo $courses . "<br>";
        }
    
        if($_POST['grade-edit'] != NULL){
            $grade = $_POST['grade-edit'];
            echo $grade . "<br>";
        }
    
        if($_POST['language-edit'] != NULL){
            $lang = $_POST['language-edit'];
            echo $lang . "<br>";
        }
    
        if($_POST['location-edit'] != NULL){
            $city = $_POST['location-edit'];
            echo $city . "<br>";
        }

        $query = "UPDATE personalization SET city = '$city', grade = $grade, courses = '$courses', lang = '$lang' WHERE student_id = $currentUser";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die('database query failed update');
        }
    }

    // mysqli_free_result($result);
    mysqli_close($connection);

    echo '<script language="javascript">';
    echo "window.location.href='student_personalization.php';";
    echo '</script>';
?>