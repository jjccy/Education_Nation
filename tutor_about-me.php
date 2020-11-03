<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Account Settings - About Me</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/account-settings.css">
    <link rel="stylesheet" href="css/signup.css">
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

      <!-- start account setting content -->
      <div class="account-settings">
        <div class="user-overlay">
          <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
          <div class="user-info-wrapper">
            <div class="space-filler"></div>
            <div class="user-info">
              <p class="heading-1 tutor-name">
                <?php
                  // get database
                  $connection = mysqli_connect("localhost", "root", "", "terence_liu");

                  if(mysqli_connect_errno()) {
                    // if fail, skip all php and print errors

                    die("Database connet failed: " .
                      mysqli_connect_error() .
                      " (" . mysqli_connect_errno(). ")"
                    );
                  }

                  // stating the deliminator
                  $d ='#KR#%5>DSG<)(E667)F?';

                  // change above step to session
                  $currentUser = $_SESSION['name'];

                  $query = "SELECT * FROM member WHERE member.fname = '$currentUser'";

                  // get result from database;
                  $result = mysqli_query($connection, $query);

                  if (!$result) {
                    die('database query failed');
                  }

                  while ($row = $result -> fetch_assoc()) {
                    echo $row['fname'] . " " . $row['lname'] . "<br>";
                  }

                  mysqli_free_result($result);
                  mysqli_close($connection);

                ?>
              </p>
              <p class="tutor-spec">Math Tutor (K-12)</p>
            </div>
          </div>

        </div>

        <p class="title-with-icon heading-1 icon-setting">Account Settings</p>

        <div class="account-content">

          <div class="account-menu">
            <a href="account-settings.php" class="title-with-icon body-text icon-setting account-setting-menu">Account Settings</a>
            <a href="" class="title-with-icon body-text icon-clock account-setting-menu">Upcoming Bookings</a>
            <a href="tutor_about-me.php" class="title-with-icon body-text icon-tutor-about account-setting-menu title-active">About Me</a>
            <a href="" class="title-with-icon body-text icon-calendar account-setting-menu">Availability</a>
            <a href="" class="title-with-icon body-text icon-booking-history account-setting-menu">Booking History</a>
            <a href="" class="title-with-icon body-text icon-star account-setting-menu">Reviews</a>
          </div>

          <div class="account-setting-about">
            <textarea>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.

Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
            </textarea>
          </div>


        </div>
      </div>

      <!-- end account setting  content -->

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

    <!-- script for form -->
    <script type="text/javascript">
      var password = document.getElementById("password-edit-input"),
          confirm_password = document.getElementById("password-confirm-input");

      password.onchange = function() {validatePassword();};
      confirm_password.onkeyup = function() {validatePassword();};

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      function show(id) {
        event.preventDefault();

        var x = document.getElementById(id);

        if (x.type == "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }

        return false;
      }


    </script>
    <!-- end script for form -->


    <script src="js/script.js"></script>

  </body>
</html>
