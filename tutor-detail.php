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

      <!-- start top nav -->
      <div class="top-nav">

        <div class="top-nav-item logo">
          <a href="index.php"><img src="img/Logo.svg" alt="Logo image"></a>
        </div>

        <div class="top-nav-item">
          <div class="searchbar">
              <button type="submit" name="search" aria-label="search-button"></button>
              <input type="search" name="search" aria-label="search" placeholder="Search for tutors or subjects...">

          </div>
        </div>

        <div class="max-flex-box-item"></div>

        <div class="top-nav-item account-section" id='not-login'>
          <div class="top-nav-item">
            <a href="sign-up.php">Sign up</a>
          </div>
          <div class="top-nav-item">
            <a href="login.php">Login</a>
          </div>
        </div>

        <div class="top-nav-item account-section" id='logined'>
          <div class="cart-quantity-top">
            <a href="cart.php" class="title-with-icon heading-3 icon-cart">Cart: 3</a>
          </div>

          <div class="dropDown">

            <!-- check if user login, if so, display loign status, if not, display login / sign up link -->
            <?php


              if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true) {
                  $connection = mysqli_connect("localhost", "root", "", "terence_liu");
                  $profileImage = mysqli_fetch_array(mysqli_query($connection, "SELECT member.profile_address FROM member
                                                                                WHERE member.m_id = " .  $_COOKIE['m_id']))[0];

                  mysqli_close($connection);

                  if ($profileImage == null) {
                    $profileImage = "img/member/default.jpg";
                  }

                  echo "<script language='javascript'>
                          document.getElementById('logined').classList.add('display');
                        </script>";

              } else {
                echo "<script language='javascript'>
                        document.getElementById('not-login').classList.add('display');
                      </script>";
              }
            ?>

            <button class="dropbtn">
              <div class="login-wrapper">
                <div class="icon-pic profile-picture" style="background-image:url(<?php echo $profileImage?>)"></div>
                  <p class="heading-3"> <span class="hello"> Hello </span>
                  <?php echo $_COOKIE['name']?>
                 </p>
                <div class="icon-caret"></div>
              </div>

            </button>

            <div class="dropdown-content">

              <a href="logOut.php">Log out</a>
              <a href="account-settings.php">Account Setting</a>
            </div>

          </div>
          <!-- end login-wrapper -->

        </div>
        <!-- end  logined section-->



      </div>
      <!-- ends top nav -->

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

            $connection = mysqli_connect("localhost", "root", "", "terence_liu");
            if(mysqli_connect_errno()) {
              // if fail, skip all php and print errors

              die("Database connet failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno(). ")"
              );
            }

            // get tutor info
            $tutorInfo = mysqli_fetch_array(mysqli_query($connection, "SELECT member.fname, member.lname, member.profile_address, tutor.bio
                                                    FROM member INNER JOIN tutor ON member.m_id = $tutorID
                                                    WHERE $tutorID = tutor.tutor_id"));

            if (!$tutorInfo) {
              die ("get tutor info fail " . mysqli_error($connection));
            }

            $tutorfname = $tutorInfo['fname'];
            $tutorlname = $tutorInfo['lname'];

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
                echo (isset($tutorID) ? $tutorInfo['bio'] : "Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
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

                $query = "SELECT AVG(rating) AS AverageReview FROM review";

                $average = mysqli_fetch_array(mysqli_query($connection, $query))[0];
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
                <p class="body-text"><?php echo isset($tutorID) ? count($reviews) : "0"; ?> reviews</p>
                <div class="max-flex-box-item"></div>
              </div>

              <?php
              // print every posts
              if (isset($tutorID)) {
                while ($row = mysqli_fetch_array($reviews))
                {
                  $studentName = $row['fname'] . " " . $row['lname'];

                  echo "string";
                }
              }

              ?>

              <!-- for each post -->
              <div class="posts">
                <p class="body-text">Jenniffer Lee</p>
                <div>
                  <!-- ther star div -->
                  <div class="Stars post" style="--rating: 5;" aria-label="Rating of this product is 2.3 out of 5."></div>
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
              </div>

              <!-- for each post -->
              <div class="posts">
                <p class="body-text">Jenniffer Lee</p>
                <div>
                  <!-- ther star div -->
                  <div class="Stars post" style="--rating: 0;" aria-label="Rating of this product is 2.3 out of 5."></div>
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
              </div>
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

          <div class="image-holder">
            <div class="card-container">
              <?php
              if (isset($tutorID)) {
                // get profile address;
                $profileImage = $tutorInfo['profile_address'];
                if ($profileImage == null) {
                  $profileImage = "img/member/default.jpg";
                }

                echo "<img src='$profileImage' alt='$tutorfname Profile Picture'>";
              }
              else {
                echo "<img src='img/Tutor_PFP.png' alt='Tutor Profile Picture'>";
              }


               ?>
                <div class="info-wrapper">
                    <div class="card-info">
                        <p class="heading-4"><?php echo (isset($tutorID) ? "$tutorfname $tutorlname" : "Susan White"); ?></p>
                        <p class="body-text tutor-spec">Grade 9 - Math</p>
                    </div>
                </div>
            </div>
          </div>

        </div>
        <!-- end detail info -->

      </section>
      <!-- end tutro detail section -->


    </div>
    <!-- end body wrapper -->







    <!-- footer starts here -->

    <footer>


    </footer>

    <!-- end of footer section -->

    <script src="js/script.js"></script>
    <script src="js/tutorDetail.js"></script>

  </body>
</html>
