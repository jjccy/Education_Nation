<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Account Settings</title>

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

      <!-- start account setting about content -->
      <div class="account-settings">
        <div class="account-settings-container">
          <div class="user-overlay">
            <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
            <div class="user-info-container">
            <div class="space-filler"></div>
            <div class="user-info-wrapper">
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
                    $currentUser = $_COOKIE['m_id'];

                    $query = "SELECT * FROM member WHERE member.m_id = '$currentUser'";

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
              <div class="user-info">
                <p class="heading-3 tutor-balance">Balance </p>
                <p class="heading-3 tutor-balance-amount">$3000.51</p>
              </div>
            </div>
            </div>

          </div>

          <div class="account-settings-header">
            <div class="heading-spacer"></div>
            <div class="header-wrapper">
              <p class="title-with-icon heading-1 icon-tutor-about">About Me</p>
            </div>
            <!-- <div class="space-filler"></div> -->
          </div>

          <div class="account-content">

            <div class="account-menu">
              <div class="account-menu-container">
                <a href="account-settings.php" class="title-with-icon body-text icon-setting account-setting-menu">Account Settings</a>
                <a href="tutor_upcoming-booking.php" class="title-with-icon body-text icon-clock account-setting-menu">Upcoming Bookings</a>
                <a href="tutor_about-me.php" class="title-with-icon body-text icon-tutor-about account-setting-menu title-active">About Me</a>
                <a href="tutor_availability.php" class="title-with-icon body-text icon-calendar account-setting-menu">Availability</a>
                <a href="tutor_booking-history.php" class="title-with-icon body-text icon-booking-history account-setting-menu">Booking History</a>
                <a href="tutor_reviews.php" class="title-with-icon body-text icon-star account-setting-menu">Reviews</a>
              </div>
            </div>

            <div class="account-setting-about">
              <textarea>
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.

              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
              </textarea>

              <div class="about-btn-container">
                <button class="btn btn-outline">Cancel</button>
                <button class="btn btn-fill">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- end account setting  about content -->

    </div>
    <!-- end body wrapper -->



    <!-- footer starts here -->
    <?php include('shared/footer.php'); ?>

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
