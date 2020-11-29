<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Account Settings</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/account-settings.css">

  </head>

  <body>
    <?php include('shared/checkLogin.php'); ?>
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
          <?php include('shared/account-settings-userOverlay.php'); ?>

          <div class="account-settings-header">
            <div class="heading-spacer"></div>
            <div class="header-wrapper">
              <p class="title-with-icon heading-1 icon-booking-history">Booking History</p>
            </div>
            <!-- <div class="space-filler"></div> -->
          </div>

          <div class="account-content">
            <?php include('shared/account-settings-menu.php'); ?>
            <!-- container for all the booking history cards -->
            <div class="account-setting-list">
              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!-- card for each tutor booking history -->
              <div class="list-card">
                <div class="card-img">
                  <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
                </div>
                <div class="card-title">
                  <p class=heading-1>Ashley Bucha</p>
                </div>
                <div class="card-detail">
                    <div class="information-wrapper">
                      <div class="student-info">
                        <div class="same-line">
                          <p class="body-text">Subject: </p>
                          <p class="body-text">Math</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Grade: </p>
                          <p class="body-text">4</p>
                        </div>
                      </div>
                      <div class="appointment-info">
                        <div class="same-line">
                          <p class="body-text">Date: </p>
                          <p class="body-text">October 31, 2020</p>
                        </div>
                        <div class="same-line">
                          <p class="body-text">Time: </p>
                          <p class="body-text">3PM - 4PM</p>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- end account setting  about content -->

    </div>
    <!-- end body wrapper -->



    <!-- footer starts here -->
    <?php include('shared/topNav.php'); ?>

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
