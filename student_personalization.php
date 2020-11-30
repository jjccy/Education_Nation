<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Personalization</title>

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
              <p class="title-with-icon heading-1 icon-customize">Personalization</p>
            </div>
          </div>

          <div class="account-content">
            <!--Display account setting inner menu for members (student or tutor)-->
            <?php include('shared/account-settings-menu.php'); ?>

            <!-- Personalization Content -->
            <div class="personalization">
                <form id="edit-personalization-form" action="update_personalization.php" method="post">
                    <div class="form-group">
                        <label for="subject-edit" class="form-label"> Subjects of Interest </label>
                        <input type="text" name="subject-edit" id="subject-edit" class="text-box" placeholder="Math, Science, English">

                        <label for="grade-edit" class="form-label"> Enter Grade </label>
                        <input type="text" name="grade-edit" id="grade-edit" class="text-box" placeholder="2">

                        <label for="language-edit" class="form-label"> Preferred Language </label>
                        <input type="text" name="language-edit" id="language-edit" class="text-box" placeholder="English">

                        <label for="location-edit" class="form-label"> Preferred Area </label>
                        <input type="text" name="location-edit" id="location-edit" class="text-box" placeholder="Vancouver">

                        <!-- on submit sends runs update_personalization.php -->
                        <div class="form-submit">
                            <input type="submit" name="edit-personalization-submit" id="edit-personalization-submit" value="Update" class="btn button-default">
                        </div>
                    </div>
                </form>
            </div>

            <div class="space-filler"></div>


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
