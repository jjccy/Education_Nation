<?php
if(isset($_POST['submitReview'])) {
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  // get input review
  $returnPage = $_POST['currentPage'];
  $tutorID = $_POST['tutorID'];
  $courseId = $_POST['selectCourse'];
  $comment = $_POST['comment'];
  //Set the rating to 0 if there is no input, otherwise set rate to the inputted rating
  (!isset($_POST['rate'])) ? $rate = 0 : $rate = $_POST['rate'];
  //connecting to database using member's account info
  $connection = mysqli_connect("localhost", $_SESSION['email'] , $_SESSION['password'] , "terence_liu");

  if(mysqli_connect_errno()) {
    // if fail, skip all php and print errors
    die("Database connet failed: " .
      mysqli_connect_error() .
      " (" . mysqli_connect_errno(). ")"
    );
  }

  // create query for new review - used if user did not set anything
  if ($courseId == -99) {
    $newReview = "INSERT INTO review (student_id, tutor_id, rating, comments)
    VALUES ('" . $_SESSION['m_id'] . "', '" . $tutorID . "', '".  $rate . "', '" . $comment . "')";
  }
  // create query for new review
  else {
    $newReview = "INSERT INTO review (student_id, tutor_id, c_id, rating, comments)
    VALUES ('" . $_SESSION['m_id'] . "', '" . $tutorID . "', '" . $courseId . "', '".  $rate . "', '" . $comment . "')";
  }

  //check if database insert review query worked or not
  if (!mysqli_query($connection, $newReview)) {
    die("insert review fail" . mysqli_error($connection));
  }
}
//return to tutor detail page once done
echo '<script language="javascript">';
echo "window.location.href='$returnPage';";
echo '</script>';
 ?>
