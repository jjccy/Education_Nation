<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$connection = mysqli_connect("localhost", "view", "", "terence_liu");
if(mysqli_connect_errno()) {
  // if fail, skip all php and print errors

  die("Database connet failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno(). ")"
  );
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$query = "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.c_id
          FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
          INNER JOIN member ON course.tutor_id = member.m_id";

// add search condition
if (isset($_GET['searchInput'])) {
  $input = explode(" ", $_GET['searchInput']);

  $query .= " WHERE tutor.tutor_id < 0";

  foreach ($input as &$value) {
    $query .= " OR UPPER(member.fname) like UPPER('%" . $value . "%')";
    $query .= " OR UPPER(member.lname) like UPPER('%" . $value . "%')";
    $query .= " OR UPPER(course.subject_name) like UPPER('%" . $value . "%')";
    // $query .= " OR UPPER(course.min_grade) like UPPER('%" . $value . "%')";
    // $query .= " OR UPPER(course.max_grade) like UPPER('%" . $value . "%')";
  }
}

$courseList = mysqli_query($connection, $query);

if (!$courseList) {
    die("get tutorlist failed: " . mysqli_error($connection));
}

// if result is smaller than 1, tell user no found result
if (1 > ($courseList->num_rows)) {
  echo "<p class='heading-4'>No Match result</p>";
}

// print each tutor from list
while ($row = mysqli_fetch_array($courseList))
{
  // get profile address;
  $profileImage = $row['profile_address'];
  if ($profileImage == null) {
    $profileImage = "img/member/default.jpg";
  }

  // get name and id;
  $tutorfame = $row['fname'];
  $tutorlame = $row['lname'];
  $tutorID = $row['tutor_id'];
  $courseID = $row['c_id'];
  $courseName = $row['subject_name'];
  $minGrade = ($row['min_grade'] == 0) ? "K" : $row['min_grade'];
  $maxGrade = $row['max_grade'];

  ($minGrade === 0) ? $minGrade = "K" : true;

  // send tutor id through url
  $url = "tutor-detail.php";
  $query = parse_url($url, PHP_URL_QUERY);

  // Returns a string if the URL has parameters or NULL if not
  if ($query) {
      $url .= "&course_id=" . $courseID . "&tutor_id=" . $tutorID;
  } else {
      $url .= "?course_id=" . $courseID . "&tutor_id=" . $tutorID;
  }



  // print the tutor card
  echo "<a href='$url' class='card-container'>";
  echo "<img src='$profileImage' alt='$tutorfame Profile Picture'>";
  echo "<div class='info-wrapper'>";
  echo "<div class='card-info'>";
  echo "<p class='heading-4'>$tutorfame $tutorlame</p>";
  echo "<p class='body-text tutor-spec'>$courseName | $minGrade - $maxGrade</p>";
  echo "</div>";
  echo "</div>";
  echo "</a>";


}

// release returned data
mysqli_free_result($courseList);
mysqli_close($connection);

 ?>
