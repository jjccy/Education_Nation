<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
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

        <!-- home best tutors section Slider carousel-->
        <section class="home-slider">
          <div class="slider-title-section">
            <p class="title-with-icon heading-1 icon-award">Best Tutors Of The Month</p>

            <!-- slider buttons -->
            <div class="max-flex-box-item"></div>

            <div class="slider-button">
              <a href="#" class="arrow-btn" id="left-button">
                <p>&#8592;</p>
              </a>
              <div class="page-number">
                <p class="body-text" id="currentPage">01</p>
                <p class="body-text"> / </p>
                <p class="body-text" id="totalPage">03</p>
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

                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-container slide">
                      <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                      <div class="info-wrapper">
                          <div class="card-info">
                              <p class="heading-4">Susan White</p>
                              <p class="body-text tutor-spec">Grade 9 - Math</p>
                              <a href="tutor-detail.php" class="btn">See More</a>
                          </div>
                      </div>
                  </div>

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

    <footer>


    </footer>

    <!-- end of footer section -->
    <!-- Script for Slider-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/slider.js"></script>
    <!-- End of Script for Slider-->

    <script src="js/script.js"></script>
    <script src="js/horzontal-scroll.js"></script>

  </body>
</html>
