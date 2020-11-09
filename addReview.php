<?php
if(isset($_POST['submitReview'])) {

  // get input review
  $returnPage = $_POST['currentPage'];
  $tutorID = $_POST['tutorID'];
  $courseId = $_POST['selectCourse'];
  $comment = $_POST['comment'];

  (!isset($_POST['rate'])) ? $rate = 0 : $rate = $_POST['rate'];

  $connection = mysqli_connect("localhost", "root", "", "terence_liu");

  if(mysqli_connect_errno()) {
    // if fail, skip all php and print errors

    die("Database connet failed: " .
      mysqli_connect_error() .
      " (" . mysqli_connect_errno(). ")"
    );
  }

  // create query for new review

  if ($courseId == -99) {
    $newReview = "INSERT INTO review (student_id, tutor_id, rating, comments)
    VALUES ('" . $_SESSION['m_id'] . "', '" . $tutorID . "', '".  $rate . "', '" . $comment . "')";
  }
  else {
    $newReview = "INSERT INTO review (student_id, tutor_id, c_id, rating, comments)
    VALUES ('" . $_SESSION['m_id'] . "', '" . $tutorID . "', '" . $courseId . "', '".  $rate . "', '" . $comment . "')";
  }


  if (!mysqli_query($connection, $newReview)) {
    die("insert review fail" . mysqli_error($connection));
  }
}

echo '<script language="javascript">';
echo "window.location.href='$returnPage';";
echo '</script>';
 ?>
