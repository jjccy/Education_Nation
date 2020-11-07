<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Tutor Detail</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/tutorDetail.css">
  </head>

  <body>
    <!-- background -->
    <div class="background"></div>

    <!-- start of chat module -->
    <div class="iframe-wrapper">
      <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
    </div>
    <!-- end of chat module -->

    <!-- start body wrapper -->
    <div class="body-wrapper">

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

      <!-- start tutor detail section -->
      <section class="tutor-detail">
        <?php
          // if tutor id is not null
          if(isset($_GET['tutor_id'])) {
            // get target tutor id
            $tutorID = $_GET['tutor_id'];
            $courseID = $_GET['course_id'];

            $connection = mysqli_connect("localhost", "root", "", "terence_liu");
            if(mysqli_connect_errno()) {
              // if fail, skip all php and print errors

              die("Database connet failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno(). ")"
              );
            }

            // get tutor info
            $courseInfo = mysqli_fetch_array(mysqli_query($connection, "SELECT member.fname, member.lname, member.profile_address,
            course.subject_name, course.min_grade, course.max_grade, course.c_id, course.price, tutor.bio, tutor.primary_language, tutor.city, tutor.country
                                                    FROM course INNER JOIN tutor ON course.tutor_id = $tutorID
                                                    INNER JOIN member ON member.m_id = $tutorID
                                                    WHERE $courseID = course.c_id"));

            if (!$courseInfo) {
              die ("get tutor info fail " . mysqli_error($connection));
            }

            $tutorfname = $courseInfo['fname'];
            $tutorlname = $courseInfo['lname'];

            // get tutor reiews
            $reviews = mysqli_query($connection, "SELECT review.date_posted, review.rating, review.comments, member.fname, member.lname
                                                    FROM review INNER JOIN member ON review.student_id = member.m_id
                                                    WHERE $tutorID = review.tutor_id");

            if (!$reviews) {
              die ("get reviews fail " . mysqli_error($connection));
            }


            mysqli_close($connection);
          }

        ?>
        <p class="title-with-icon heading-1 icon-tutors">
          <?php echo (isset($tutorID) ? "$tutorfname $tutorlname" : "Susan White"); ?>
        </p>

        <!-- start detail info -->
        <div class="detail-info">

          <!-- start actual info -->
          <div class="actual-info">

            <div class="info-btns">
              <a href="#" class="info-btn" onclick="displayContent(about)">
                <img src="img/Tutor_About.svg" alt="About image">
                <p>About Me</p>
              </a>
              <a href="#" class="info-btn" onclick="displayContent(review)">
                <img src="img/Tutor_Reviews.svg" alt="temp image">
                <p>Review</p>
              </a>
              <a href="#" class="info-btn" onclick="displayContent(availability)">
                <img src="img/Tutor_Availability.svg" alt="Calendar image">
                <p>Availability</p>
              </a>
            </div>

            <section class="text-area display" id="about">
              <p class="heading-2">About Me</p>
              <p class="body-text">
                <?php
                // if get tutor id, display tutor's bio, if not, display default one
                echo (isset($tutorID) ? $courseInfo['bio'] : "Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est
                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<br><br>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                At vero eos et accusam et justo duo dolores et ea rebum.");
                ?>
            </section>

            <section class="text-area" id="review">
              <?php
              if (isset($tutorID)) {
                $connection = mysqli_connect("localhost", "root", "", "terence_liu");
                if(mysqli_connect_errno()) {
                  // if fail, skip all php and print errors

                  die("Database connet failed: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno(). ")"
                  );
                }

                $query = "SELECT AVG(rating) AS AverageReview FROM review WHERE $tutorID = review.tutor_id";

                $average = mysqli_fetch_array(mysqli_query($connection, $query))[0];
                $average == null ? $average = 0 : $average = $average;

                $average = number_format($average, 1, '.', '');

                $count = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(review.r_id) FROM review WHERE $tutorID = review.tutor_id"))[0];

                mysqli_close($connection);
              }
              else {
                $average = 0;
              }


               ?>
              <!-- overall review -->
              <p class="heading-2">Reviews</p>
              <div class="overall-review">
                <p class="body-text"><?php echo $average; ?></p>
                <!-- ther star div -->
                <div class="Stars" style="--rating: <?php echo $average; ?>;" aria-label="Rating of this product is <?php echo $average; ?> out of 5."></div>
                <p class="body-text"><?php echo isset($tutorID) ? $count . " " : "0 "; ?>reviews</p>
                <div class="max-flex-box-item"></div>

                <a id='writeReview' href="#">Write Reivew</a>
              </div>

              <?php

              // function to convert time stamp to days ago.
              function time_elapsed_string($datetime, $full = false) {
                  $now = new DateTime;
                  $ago = new DateTime($datetime);
                  $diff = $now->diff($ago);

                  $diff->w = floor($diff->d / 7);
                  $diff->d -= $diff->w * 7;

                  $string = array(
                      'y' => 'year',
                      'm' => 'month',
                      'w' => 'week',
                      'd' => 'day',
                      'h' => 'hour',
                      'i' => 'minute',
                      's' => 'second',
                  );
                  foreach ($string as $k => &$v) {
                      if ($diff->$k) {
                          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                      } else {
                          unset($string[$k]);
                      }
                  }

                  if (!$full) $string = array_slice($string, 0, 1);
                  return $string ? implode(', ', $string) . ' ago' : 'just now';
              }


              // print every posts
              if (isset($tutorID)) {
                while ($row = mysqli_fetch_array($reviews))
                {
                  $studentName = $row['fname'] . " " . $row['lname'];
                  $rating = $row['rating'];
                  $comment = $row['comments'];

                  echo "<div class='posts'>
                    <p class='body-text'>$studentName</p>
                    <div>
                      <!-- ther star div -->
                      <div class='Stars post' style='--rating: ". $rating .";' aria-label='Rating of this product is ". $rating ." out of 5.'></div>
                      <p class='body-text'>". time_elapsed_string($row['date_posted']) . "</p>
                    </div>
                    <p class='body-text'>
                      $comment
                    </p>
                  </div>";


                }
              }

              ?>

              <!-- for each post template -->
              <!-- <div class="posts">
                <p class="body-text">Jenniffer Lee</p>
                <div>
                  <div class="Stars post" style=" rating: 5;" aria-label="Rating of this product is 2.3 out of 5."></div>
                  <p class="body-text">5 days ago</p>
                </div>
                <p class="body-text">
                  Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                  sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                  Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                  ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                  consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                  invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                  At vero eos et accusam et justo duo dolores et ea rebum.
                </p>
              </div> -->

            </section>

            <section class="text-area" id="availability">
              <p class="heading-2">Availability</p>
              <p class="body-text">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est
                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.

              </p>
              <p class="body-text">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                At vero eos et accusam et justo duo dolores et ea rebum.
              </p>
            </section>
          </div>
          <!-- end actual info -->

          <div class="max-flex-box-item"></div>

          <!-- start right side couse info section -->
          <div class="course-info">

            <div class="image-holder">
              <div class="card-container">
                <?php
                if (isset($tutorID)) {
                  // get profile address;
                  $profileImage = $courseInfo['profile_address'];
                  if ($profileImage == null) {
                    $profileImage = "img/member/default.jpg";
                  }

                  $courseName = $courseInfo['subject_name'];
                  $minGrade = $courseInfo['min_grade'];
                  $maxGrade = $courseInfo['max_grade'];

                  echo "<img src='$profileImage' alt='$tutorfname Profile Picture'>";
                }
                else {
                  echo "<img src='img/Tutor_PFP.png' alt='Tutor Profile Picture'>";
                }


                 ?>
                  <div class="info-wrapper">
                      <div class="card-info">
                          <p class="heading-4"><?php echo (isset($tutorID) ? "$tutorfname $tutorlname" : "Susan White"); ?></p>
                          <p class="body-text tutor-spec"><?php echo (isset($tutorID) ? "Grade " . $minGrade . " - " . $maxGrade . " : " . $courseName : "Grade 9 - Math"); ?></p>
                      </div>
                  </div>
              </div>
            </div>

            <?php
            if (isset($tutorID)) {
              // get course info

              $price = "$" . $courseInfo['price'] . "/hour";
              $language = explode(", ", $courseInfo['primary_language']);
              $location = $courseInfo['city'] . ", " . $courseInfo['country'];
            }
            else {
              // display default values
              $price = "$24.00/hour";
              $language = ["English","Spanish"];
              $location = "Vancouver, Canada";
            }
             ?>

            <!-- course info text -->
            <div class="course-info-text">
              <p class="heading-2">Price</p>
              <p id='course-price'><?php echo $price ?></p>
            </div>

            <div class="course-info-text">
              <p class="heading-2">Language</p>
              <?php
              foreach ($language as &$lang) {
                  echo "<p class='body-text'>$lang</p>";
              }
               ?>
            </div>

            <div class="course-info-text">
              <p class="heading-2">Location</p>
              <p class='body-text'><?php echo $location ?></p>
            </div>

          </div>




        </div>
        <!-- end detail info -->

      </section>
      <!-- end tutro detail section -->


    </div>
    <!-- end body wrapper -->







    <!-- footer starts here -->
    <?php include('shared/footer.php'); ?>

    <!-- end of footer section -->

    <script src="js/script.js"></script>
    <script src="js/tutorDetail.js"></script>

  </body>
</html>
