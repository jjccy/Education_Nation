<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Home</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/homePage.css">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="background"></div>

    <!-- start of chat module -->
    <div class="iframe-wrapper">
      <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
    </div>
    <!-- end of chat module -->

    <!-- start body wrapper -->
    <div class="body-wrapper">
      <!--Display top nav from shared-->
      <?php include('shared/topNav.php'); ?>

      <!-- start side nav -->
      <div class="side-nav">
        <div class="side-nav-item main-menu">
          <p class="heading-2">Explore</p>
          <a href="index.php" class="icon-home">Home</a>
          <a href="tutors-listing.php" class="icon-tutors">Tutors</a>
          <a href="about.php" class="icon-about">About</a>
          <a href="contact.php" class="icon-contact">Contact</a>
        </div>
        <div class="max-flex-box-item"></div>
        <div class="side-nav-item help-button">
            <a href="#" class="icon-help" id="help-center" onclick="chatModuleUp()">Help Center</a>
        </div>

      </div>
      <!-- end side nav -->

      <!-- start home page -->
      <div class="home-page">

        <!-- home title section -->
        <div class="home-title">

          <div class="home-title-item">
            <p class="title-with-icon heading-1 icon-announcement">Announcements</p>
            <img src="img/Announcement_Banner.svg" alt="Announcements">
          </div>

          <div class="max-flex-box-item"></div>

        </div>
        <!-- end home title section -->

        <!-- checking if student is logged in to display recommended courses -->
        <?php
          // check if session start has been called
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }

          // change above step to session
          if (isset($_SESSION['m_id'])) {
            $currentUser = $_SESSION['m_id'];
            $showRecommended = true;
            $displayRecommended = true;

            $connection = mysqli_connect("localhost", "view", "", "terence_liu");
            if(mysqli_connect_errno()) {
              // if fail, skip all php and print errors

              die("Database connet failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno(). ")"
              );
            }

            $query = "SELECT * FROM personalization WHERE personalization.student_id = '$currentUser'";
            // get result from database;

            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) <= 0) {
              $displayRecommended = false;
            }
            if($displayRecommended){
              while ($row = $result -> fetch_assoc()) {
                $grade = $row['grade'];
                $city = $row['city'];
                $courses = $row['courses'];
                $lang = $row['lang'];

                // echo $grade . "<br>";
                // echo $city . "<br>";
                // echo $courses . "<br>";
                // echo $lang . "<br>";
              }

              mysqli_free_result($result);

              $queryRecommended = "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.c_id, AVG(review.rating) AS AverageReview
                                  FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
                                  INNER JOIN member ON course.tutor_id = member.m_id
                                  JOIN review ON course.c_id = review.c_id
                                  WHERE tutor.city = '$city' AND tutor.primary_language LIKE '%$lang%' AND (course.min_grade <= $grade AND course.max_grade >= $grade) AND (";

              $courseArray = explode(", ", $courses);

              for ($i = 0; $i < sizeof($courseArray); $i++) {
                if (sizeof($courseArray) == 1 || $i == sizeof($courseArray) - 1) {
                  $queryRecommended .= "course.subject_name = '$courseArray[$i]') ";
                }

                else {
                  $queryRecommended .= "course.subject_name = '$courseArray[$i]' OR ";
                }
              }

              $queryRecommended .= "GROUP By course.c_id
                                    ORDER BY AverageReview DESC
                                    LIMIT 5";

              $resultRecommended = mysqli_query($connection, $queryRecommended);

              //If query to search for top 5 tutors failed die
              if (!$resultRecommended) {
                  die("get tutorlist failed: " . mysqli_error($connection));
              }

              if (mysqli_num_rows($resultRecommended) == 0) {
                $showRecommended = false;
              }
            if ($result && $showRecommended) {
        ?>
        <!-- home recommended courses Slider carousel-->
        <section class="home-slider">
          <div class="slider-title-section">
            <p class="title-with-icon heading-1 icon-recommended">Recommended Courses</p>

            <!-- slider buttons -->
            <div class="max-flex-box-item"></div>

            <div class="slider-button">
              <a href="#" class="arrow-btn" id="left-button-recommended">
                <p>&#8592;</p>
              </a>
              <div class="page-number">
                <p class="body-text" id="currentPage">01</p>
                <p class="body-text"> / </p>
                <p class="body-text" id="totalPage">02</p>
              </div>

              <a href="#" class="arrow-btn active" id="right-button-recommended">
                <p>&#8594;</p>
              </a>
            </div>
            <!-- end slider buttons -->
          </div>


          <!-- slider section-->
          <div id="elemRecommended" class="flex-box">

            <div id="outerRecommended" class="max-flex-box-item">
              <div id="innerRecommended">

                <?php
                // $connection = mysqli_connect("localhost", "view", "", "terence_liu");
                // if(mysqli_connect_errno()) {
                //   // if fail, skip all php and print errors

                //   die("Database connet failed: " .
                //     mysqli_connect_error() .
                //     " (" . mysqli_connect_errno(). ")"
                //   );
                // }

                // $query = "SELECT personalization.grade, personalization.city, personalization.courses, personalization.lang FROM personalization WHERE personalization.student_id = '$currentUser'";

                // $result = mysqli_query($connection, $query);

                // if (!$result) {
                //   die("Database connect failed insert: " .
                //   mysqli_connect_error() .
                //   " (" . mysqli_connect_errno(). ")"
                //   );
                // }

                // else {
                //   while ($row = $result -> fetch_assoc()) {
                //       $grade = $row['grade'];
                //       $city = $row['city'];
                //       $courses = $row['courses'];
                //       $lang = $row['lang'];

                //       // echo $grade . "<br>";
                //       // echo $city . "<br>";
                //       // echo $courses . "<br>";
                //       // echo $lang . "<br>";
                //   }

                //   mysqli_free_result($result);
                // }

                // $queryRecommended = "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.c_id, AVG(review.rating) AS AverageReview
                //                     FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
                //                     INNER JOIN member ON course.tutor_id = member.m_id
                //                     JOIN review ON course.c_id = review.c_id
                //                     WHERE tutor.city = '$city' AND tutor.primary_language LIKE '%$lang%' AND (course.min_grade <= $grade AND course.max_grade >= $grade) AND (";

                // $courseArray = explode(", ", $courses);

                // for ($i = 0; $i < sizeof($courseArray); $i++) {
                //   if (sizeof($courseArray) == 1 || $i == sizeof($courseArray) - 1) {
                //     $queryRecommended .= "course.subject_name = '$courseArray[$i]') ";
                //   }

                //   else {
                //     $queryRecommended .= "course.subject_name = '$courseArray[$i]' OR ";
                //   }
                // }

                // $queryRecommended .= "GROUP By course.c_id
                //                       ORDER BY AverageReview DESC
                //                       LIMIT 5";

                // $resultRecommended = mysqli_query($connection, $queryRecommended);

                // //If query to search for top 5 tutors failed die
                // if (!$resultRecommended) {
                //     die("get tutorlist failed: " . mysqli_error($connection));
                // }

                // if (mysqli_num_rows($resultRecommended) == 0) {
                //   $showRecommended = false;
                // }

                // print each tutor from list
                while ($row = mysqli_fetch_array($resultRecommended))
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
                  echo "<a href='$url' class='card-container slider'>";
                  echo "<img src='$profileImage' alt='$tutorfame Profile Picture'>";
                  echo "<div class='info-wrapper'>";
                  echo "<div class='card-info'>";
                  echo "<p class='heading-4'>$tutorfame $tutorlame</p>";
                  echo "<p class='body-text tutor-spec'>Grade $minGrade - $maxGrade : $courseName</p>";
                  echo "</div>";
                  echo "</div>";
                  echo "</a>";


                }
              }

                // release returned data
                mysqli_free_result($resultRecommended);
                mysqli_close($connection);

                 ?>


                </div> <!-- end of inner -->
            </div> <!-- end of outer -->

          </div> <!-- end of elem -->
          <!-- End of Slider Section-->


        </section>

        <?php } }?>
        <!-- end home recommended courses Slider carousel -->

        <!-- home best tutors section Slider carousel-->
        <section class="home-slider">
          <div class="slider-title-section">
            <p class="title-with-icon heading-1 icon-award">Best Course Of The Month</p>

            <!-- slider buttons -->
            <div class="max-flex-box-item"></div>

            <div class="slider-button">
              <a href="#" class="arrow-btn" id="left-button">
                <p>&#8592;</p>
              </a>
              <div class="page-number">
                <p class="body-text" id="currentPage">01</p>
                <p class="body-text"> / </p>
                <p class="body-text" id="totalPage">02</p>
              </div>

              <a href="#" class="arrow-btn active" id="right-button">
                <p>&#8594;</p>
              </a>
            </div>
            <!-- end slider buttons -->
          </div>


          <!-- slider section-->
          <div id="elem" class="flex-box">

            <div id="outer" class="max-flex-box-item">
              <div id="inner">

                <?php
                $connection = mysqli_connect("localhost", "view", "", "terence_liu");
                if(mysqli_connect_errno()) {
                  // if fail, skip all php and print errors

                  die("Database connet failed: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno(). ")"
                  );
                }
                // Query to search for the top 5 tutors' info (name, id, image address, subject, grade range) based on their average rating
                $courseList = mysqli_query($connection, "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.c_id, AVG(review.rating) AS AverageReview
                                                        FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
                                                        INNER JOIN member ON course.tutor_id = member.m_id
                                                        JOIN review ON course.c_id = review.c_id
                                                        GROUP By course.c_id
                                                        ORDER BY AverageReview DESC
                                                        LIMIT 5");
                //If query to search for top 5 tutors failed die
                if (!$courseList) {
                    die("get tutorlist failed: " . mysqli_error($connection));
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
                  echo "<a href='$url' class='card-container slider'>";
                  echo "<img src='$profileImage' alt='$tutorfame Profile Picture'>";
                  echo "<div class='info-wrapper'>";
                  echo "<div class='card-info'>";
                  echo "<p class='heading-4'>$tutorfame $tutorlame</p>";
                  echo "<p class='body-text tutor-spec'>Grade $minGrade - $maxGrade : $courseName</p>";
                  echo "</div>";
                  echo "</div>";
                  echo "</a>";


                }

                // release returned data
                mysqli_free_result($courseList);
                mysqli_close($connection);

                 ?>


                </div> <!-- end of inner -->
            </div> <!-- end of outer -->

          </div> <!-- end of elem -->
          <!-- End of Slider Section-->


        </section>
        <!-- end home best tutors section -->



      </div>
      <!-- end home page content -->

    </div>
    <!-- end body wrapper -->



    <!-- footer starts here -->
    <?php include('shared/footer.php'); ?>

    <!-- end of footer section -->
    <!-- Script for Slider-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

    <script src="js/script.js"></script>
    <script src="js/horzontal-scroll.js"></script>
    <script src="js/horizontal-scroll-recommended.js"></script>

  </body>
</html>
