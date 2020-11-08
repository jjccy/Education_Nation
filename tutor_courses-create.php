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
            <img class="user-pfp" src="
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

              // change above step to session
              $currentUser = $_COOKIE['m_id'];

              $query = "SELECT profile_address FROM member WHERE member.m_id = '$currentUser'";

              // get result from database;
              $result = mysqli_query($connection, $query);

              if (!$result) {
                die('database query failed');
              }

              while ($row = $result -> fetch_assoc()) {
                echo $row['profile_address'];
              }

              mysqli_free_result($result);
            ?>
            " alt="Account User Profile Picture">
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
                    // mysqli_close($connection);

                  ?>
                </p>
                <p class="tutor-spec">Math Tutor (K-12)</p>
              </div>
              <div class="user-info">
                <p class="heading-3 tutor-balance">Balance </p>
                <p class="heading-3 tutor-balance-amount">
                  <?php
                    $query = "SELECT * FROM tutor WHERE tutor.tutor_id = '$currentUser'";

                    // get result from database;
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                      die('database query failed');
                    }

                    while ($row = $result -> fetch_assoc()) {
                      echo "$" . $row['balance'];
                    }

                    mysqli_free_result($result);
                  ?>
                </p>
              </div>
            </div>
            </div>

          </div>

          <div class="account-settings-header">
            <div class="heading-spacer"></div>
            <div class="header-wrapper">
              <p class="title-with-icon heading-1 icon-award">Create A Course</p>
            </div>
            <!-- <div class="space-filler"></div> -->
          </div>

          <div class="account-content">

            <?php include('shared/account-settings-menu.php'); ?>

            <div class="account-setting-list tutor-courses tutor-course-create">
                <form id="create-course-form" action="create-course.php" method="post">
                    <div class="form-group">
                        <label for="subject-create" class="form-label"> Course Subject </label>
                        <input type="text" name="subject-create" id="subject-create" class="text-box" placeholder="Subject name" required>

                        <label for="wage-create" class="form-label"> Hourly Wage </label>
                        <input type="text" name="wage-create" id="wage-create" class="text-box" placeholder="Price per hour" required>

                        <label class="form-label"> Grade Range </label>
                        <input type="text" name="min-age-create" id="min-age-create" class="text-box" placeholder="Min." required>
                        <input type="text" name="max-age-create" id="max-age-create" class="text-box" placeholder="Max." required>
                
                        <!-- on submit sends runs update-account.php -->
                        <div class="form-submit">
                        <input type="submit" name="create-course-submit" id="create-course-submit" value="Create Course" class="btn button-default">
                        </div>
                    </div>
                </form>
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