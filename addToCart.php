<?php
// if session start has not been called, call session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// get input review
$courseId = $_GET['course_id'];

// connent to database
$connection = mysqli_connect("localhost", $_SESSION['email'] , $_SESSION['password'] , "terence_liu");

if(mysqli_connect_errno()) {
  // if fail, skip all php and print errors

  die("Database connet failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno(). ")"
  );
}

// create query for new Cart
$newCart = "INSERT INTO cartadd (student_id, c_id)
VALUES ('" . $_SESSION['m_id'] . "', '" . $courseId . "')";


if (!mysqli_query($connection, $newCart)) {
  die("insert review fail" . mysqli_error($connection));
}

echo '<script language="javascript">';
echo "window.location.href='cart.php';";
echo '</script>';
?>
