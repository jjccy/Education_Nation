<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up Now</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>

  <body>

    <?php include('shared/responsive-nav.php'); ?>
    
    <div class="background"></div>

    <!-- start of chat module -->
    <div class="iframe-wrapper">
      <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
    </div>
    <!-- end of chat module -->

    <!-- start body wrapper -->
    <div class="body-wrapper">

      <?php include('shared/topNav.php'); ?>

      <!-- start sign up page -->
      <div class="signup-page">

        <!-- sign up form section -->
          <div class="signup-page-item signup-form">
          <p class="title-with-icon heading-1 icon-enter">Sign up</p>

            <form id="register-form" action="new-member.php" method="post">
              <div class="form-group">

                <div class="register-flex-box">
                  <div class="register-flex-child">
                    <label for="fname-input" class="form-label"> First Name </label>
                    <input type="text" name="fname-input" id="fname-input" class="text-box" placeholder="John" required>
                  </div>
                  <div class="register-flex-child">
                    <label for="lname-input" class="form-label"> Last Name </label>
                    <input type="text" name="lname-input" id="lname-input" class="text-box" placeholder="Doe" required>
                  </div>
                </div>

                <label for="email-input" class="form-label"> Email </label>
                <input type="email" name="email-input" id="email-input" class="text-box" placeholder="Enter your email"required>
                <label for="password-input" class="form-label"> Password </label>
                <a class="form-reveal" href="#" onclick="show('password-input')"> Show </a>
                <input type="password" name="password-input" id="password-input" class="text-box" placeholder="Enter your password" required>
                <label for="confirm_password" class="form-label"> Confirm Password </label>
                <a class="form-reveal" href="#" onclick="show('confirm_password')"> Show </a>
                <input type="password" name="confirm_password" id="confirm_password" class="text-box" placeholder="Enter your password" required >

                <div class="register-flex-box">
                  <div>
                    <input type="radio" id="is-tutor" name="role" value="tutor" required>
                    <label for="role" class="link-default"> Tutor </label>
                  </div>
                  <div>
                    <input type="radio" id="is-student" name="role" value="student">
                    <label for="role" class="link-default"> Student </label>
                  </div>
                </div>

                <div class="form-submit">
                  <input type="submit" name="form-submit" id="form-submit" value="Sign up" class="button-default">
                </div>
              </div>
            </form>
            <p class="body-text">By signing up you agree to our <a class="link-default"> Terms & Conditions</a></p>
            <p class="body-text">Already have an account? <a class="link-default" href="login.php"> Log in</a></p>
          </div>
          <div class="signup-page-filler"></div>

        <!-- end sign up form section -->
        <!--Welcome message to new users-->
        <div class="signup-message">
          <img class="hand-img" src="img/Hand.svg" alt="Waving Hand">
          <p class="heading-1">Welcome! Join now to begin <br> making appointments <br> with tutors.</p>
        </div>

        <div class="signup-page-filler"></div>

      </div>
      <!-- end sign up page content -->

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

    <!-- script for sign up form -->
    <script type="text/javascript">
      var password = document.getElementById("password-input"),
          confirm_password = document.getElementById("confirm_password");

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
