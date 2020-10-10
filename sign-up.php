<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Sign Up Now</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
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

            <button class="dropbtn">
              <div class="login-wrapper">
                <div class="icon-pic profile-picture"></div>
                <p class="heading-3"> <span class="hello"> Hello </span>
                  <?php
                    session_start();

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo "<script language='javascript'>
                                document.getElementById('logined').classList.add('display');
                              </script>";

                        echo $_SESSION['name'];
                    } else {
                      echo "<script language='javascript'>
                              document.getElementById('not-login').classList.add('display');
                            </script>";
                    }
                  ?>
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

      <!-- start sign up page -->
      <div class="signup-page">

        <!-- sign up form section -->
          <div class="signup-page-item signup-form">
          <p class="title-with-icon heading-1 icon-enter">Sign up</p>

            <form id="register-form" action="new-member.php" method="post">
              <div class="form-group">
                <label for="name-input" class="form-label"> Full Name </label>
                <input type="text" name="name-input" id="name-input" class="text-box" placeholder="John Doe" required>
                <label for="email-input" class="form-label"> Email </label>
                <input type="email" name="email-input" id="email-input" class="text-box" placeholder="Enter your email"required>
                <label for="password-input" class="form-label"> Password </label>
                <a class="form-reveal" href="#" onclick="show('password-input')"> Show </a>
                <input type="password" name="password-input" id="password-input" class="text-box" placeholder="Enter your password" required>
                <label for="confirm_password" class="form-label"> Confirm Password </label>
                <a class="form-reveal" href="#" onclick="show('confirm_password')"> Show </a>
                <input type="password" name="confirm_password" id="confirm_password" class="text-box" placeholder="Enter your password" required >
                <input type="checkbox" id="signed-in" name="signed-in" value="true">
                <label for="signed-in" class="link-default"> Keep me signed in </label>

                <div class="form-submit">
                  <input type="submit" name="form-submit" id="form-submit" value="Sign up" class="button-default">
                </div>
              </div>
            </form>
            <p class="body-text">By signing up you agree to our <a class="link-default"> Terms & Conditions</a></p>
            <p class="body-text">Already have an account? <a class="link-default"> Log in</a></p>
          </div>
          <div class="signup-page-filler"></div>

        <!-- end sign up form section -->
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
