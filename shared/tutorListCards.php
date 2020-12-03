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

$query = "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address,
course.subject_name, course.min_grade, course.max_grade, course.c_id, course.price,
AVG(review.rating) AS AverageReview
          FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
          INNER JOIN member ON course.tutor_id = member.m_id
          JOIN review ON course.c_id = review.c_id";



// get the sort and filter parameter from URL

// sort condition
if (isset($_GET['course']) || isset($_GET['grade'])) {
  $query .= " WHERE tutor.tutor_id < 0";

  if (isset($_GET['grade'])) {
    $grade = explode("-", $_GET['grade']);

    $query .= " OR (course.min_grade <= " . $grade[1];
    $query .= " AND course.max_grade >= " . $grade[0] . ")";
  }

  if (isset($_GET['course'])) {
    $courses = explode("-", $_GET['course']);

    (isset($_GET['grade'])) ? $query .= " AND (" :  $query .= " OR (";

    foreach ($courses as &$course) {
        $query .= "course.subject_name = '$course' OR ";
    }

    // remove last three
    $query = substr($query, 0, -4);

    $query .= ") ";
  }

}

$query .= " GROUP By course.c_id";


// add sort condition
if (isset($_GET['sortby'])) {

  switch($_GET['sortby']) {
    case "rate":
      $query .= " ORDER BY AverageReview DESC";
      break;

    case "a-z":
      $query .= " ORDER BY member.fname";
      break;

    case "z-a":
      $query .= " ORDER BY member.fname DESC";
      break;

    case "price-high":
      $query .= " ORDER BY course.price DESC";
      break;

    case "price-low":
      $query .= " ORDER BY course.price";
      break;
  }

}

$courseList = mysqli_query($connection, $query);

if (!$courseList) {
    die("get tutorlist failed: " . mysqli_error($connection));
}

$jsonText = "";

// if result is smaller than 1, tell user no found result
if (1 > ($courseList->num_rows)) {
  $jsonText .= "<p class='heading-4'>No Match result</p>";
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
  $jsonText .= "<a href='$url' class='card-container'>";
  $jsonText .= "<img src='$profileImage' alt='$tutorfame Profile Picture'>";
  $jsonText .= "<div class='info-wrapper'>";
  $jsonText .= "<div class='card-info'>";
  $jsonText .= "<p class='heading-4'>$tutorfame $tutorlame</p>";
  $jsonText .= "<p class='body-text tutor-spec'>$courseName | $minGrade - $maxGrade</p>";
  $jsonText .= "</div>";
  $jsonText .= "</div>";
  $jsonText .= "</a>";


}
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";
$jsonText .= "<div class='max-flex-box-item'></div>";

if (!isset($myObj))
    $myObj = new stdClass();

$myObj->newList = $jsonText;

$myJSON = json_encode($myObj);

echo $myJSON;

// release returned data
mysqli_free_result($courseList);
mysqli_close($connection);

 ?>
