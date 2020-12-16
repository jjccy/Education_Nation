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
    <?php include('shared/responsive-nav.php'); ?>
    <?php include('shared/checkLogin.php'); ?>
    <div class="background"></div>

    <!-- start of chat module -->
    <div class="iframe-wrapper">
      <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
    </div>
    <!-- end of chat module -->

    <!-- start body wrapper -->

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

      <!-- start account setting content -->
      <div class="account-settings">
        <div class="account-settings-container">
          <?php include('shared/account-settings-userOverlay.php'); ?>

          <div class="account-settings-header">
            <div class="heading-spacer"></div>
            <div class="header-wrapper">
              <p class="title-with-icon heading-1 icon-setting">Account Settings</p>
            </div>
          </div>

          <div class="account-content">
            <!--Display account setting inner menu for members (student or tutor)-->
            <?php include('shared/account-settings-menu.php'); ?>

            <!-- Current user info -->
            <div class="account-content-current">
              <?php
                // get database
                $connection = mysqli_connect("localhost", "view", "", "terence_liu");

                if(mysqli_connect_errno()) {
                  // if fail, skip all php and print errors

                  die("Database connet failed: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno(). ")"
                  );
                }

                // gets row of members table to show current user
                $query = "SELECT * FROM member WHERE member.m_id = '$currentUser'";

                // get result from database;
                $result = mysqli_query($connection, $query);

                while ($row = $result -> fetch_assoc()) {
                  // current user data; being retried and displayed
                  echo '<div class="info-element-container">';
                  echo '<p class="heading-3">Current Name</p>';
                  echo '<p class="body-text">' . $row['fname'] . " " . $row['lname'] . '</p>';
                  echo '</div>';

                  echo '<div class="info-element-container">';
                  echo '<p class="heading-3">Current Email</p>';
                  echo '<p class="body-text">' . $row['email'] . '</p>';
                  echo '</div>';

                  echo '<div class="info-element-container">';
                  echo '<p class="heading-3">Current Password</p>';
                  echo '<p class="body-text">';

                  // getting password length and displaying it's length in '*'s
                  // $passwordLength = strlen($row['password']);

                  for ($i = 0; $i < 10; $i++) {
                    echo '*';
                  }

                  echo '</p>';
                  echo '</div>';
                }


                mysqli_free_result($result);
                mysqli_close($connection);
              ?>
            </div>

            <!-- Update form for user info -->
            <div class="account-content-new">

              <!-- form allows for user to update the account info -->
              <!-- current password and new password is required to update any information -->
              <form id="edit-account-form" action="update-account.php" method="post">
                <div class="form-group">
                  <label for="fname-edit" class="form-label"> First Name </label>
                  <input type="text" name="fname-edit" id="fname-edit" class="text-box" placeholder="John">

                  <label for="lname-edit" class="form-label"> Last Name </label>
                  <input type="text" name="lname-edit" id="lname-edit" class="text-box" placeholder="Doe">

                  <label for="email-edit" class="form-label"> Email </label>
                  <input type="text" name="email-edit" id="email-edit" class="text-box" placeholder="you@example.com">

                  <label for="current-password-input" class="form-label"> Current Password </label>
                  <a class="form-reveal" href="#" onclick="show('current-password-input')"> Show </a>
                  <input type="password" name="current-password-input" id="current-password-input" class="text-box" placeholder="Enter your new password" required>

                  <label for="password-edit-input" class="form-label"> New Password </label>
                  <a class="form-reveal" href="#" onclick="show('password-edit-input'), show('password-confirm-input')"> Show </a>
                  <input type="password" name="password-edit-input" id="password-edit-input" class="text-box" placeholder="Enter your new password" required>

                  <label for="password-confirm-input" class="form-label"> Confirm Password </label>
                  <input type="password" name="password-confirm-input" id="password-confirm-input" class="text-box" placeholder="Enter your new password" required>

                  <!-- on submit sends runs update-account.php -->
                  <div class="form-submit">
                    <input type="submit" name="edit-account-submit" id="edit-account-submit" value="Update" class="btn button-default">
                  </div>
                </div>
              </form>
            </div>


          </div>
        </div>
      </div>

      <!-- end account setting  content -->

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
      //Get new password from input field
      var password = document.getElementById("password-edit-input"),
          confirm_password = document.getElementById("password-confirm-input");

      password.onchange = function() {validatePassword();};
      confirm_password.onkeyup = function() {validatePassword();};
      //Function to check if password is correct
      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
      //Function to show and hide password
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
