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
              session_start();

              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                  $connection = mysqli_connect("localhost", "root", "", "terence_liu");
                  $profileImage = mysqli_fetch_array(mysqli_query($connection, "SELECT member.profile_address FROM member
                                                                                WHERE member.m_id = " .  $_SESSION['m_id']))[0];

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
                  <?php echo $_SESSION['name']?>
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
        <p class="title-with-icon heading-1 icon-tutors">Susan White</p>

        <!-- start detail info -->
        <div class="detail-info">

          <!-- start actual info -->
          <div class="actual-info">

            <div class="info-btns">
              <a href="#" class="info-btn" onclick="displayContent(about)">
                <img src="img/Tutor_About.svg" alt="About image">
                <p>About Us</p>
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

            <section class="text-area" id="review">
              <!-- overall review -->
              <p class="heading-2">Reviews</p>
              <div class="overall-review">
                <p class="body-text">2.5</p>
                <!-- ther star div -->
                <div class="Stars" style="--rating: 2.5;" aria-label="Rating of this product is 2.3 out of 5."></div>
                <p class="body-text">2 reviews</p>
                <div class="max-flex-box-item"></div>
              </div>

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
                <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                <div class="info-wrapper">
                    <div class="card-info">
                        <p class="heading-4">Susan White</p>
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
