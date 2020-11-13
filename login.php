<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Log in</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/login.css">

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

      <!-- start login page -->
      <div class="login-page">

        <!-- login form section -->
          <div class="login-page-item login-form">
          <p class="title-with-icon heading-1 icon-enter">Log in</p>

            <form id="login-form" action="returning-member.php" method="post">
              <div class="form-group">
                <label for="email-input" class="form-label"> Email </label>
                <input type="text" name="email-input" id="email-input" class="text-box" placeholder="you@example.com"required>
                <label for="password-input" class="form-label"> Password </label>
                <a class="form-reveal" href="#"> Forgot Password? </a>
                <input type="password" name="password-input" id="password-input" class="text-box" placeholder="Enter your password" required>
                <input type="checkbox" id="signed-in" name="signed-in" value="true">
                <label for="signed-in" class="link-default"> Keep me signed in </label>

                <div class="form-submit">
                  <input type="submit" name="form-submit" id="form-submit" value="Log in" class="button-default">
                </div>
              </div>
            </form>
          </div>
          <div class="login-page-filler"></div>

        <!-- end login form section -->
        <!-- Welcome back message to users when they log in-->
        <div class="login-message">
          <img class="hand-img" src="img/Hand.svg" alt="Waving Hand">
          <p class="heading-1">Welcome Back!</p>
        </div>

        <div class="login-page-filler"></div>

      </div>
      <!-- end login page content -->

    </div>
    <!-- end body wrapper -->



    <!-- footer starts here -->
    <?php include('shared/footer.php'); ?>

    <!-- end of footer section -->

    <!-- script for log in form -->
    <script type="text/javascript">
    //Get password input
      var password = document.getElementById("password-input"),
          confirm_password = document.getElementById("confirm_password");

      password.onchange = function() {validatePassword();};
      confirm_password.onkeyup = function() {validatePassword();};
      //Check if passwords match or not
      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
      //hide the password
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
