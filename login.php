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
        <!-- Nav Bar When Not Logged in-->
        <div class="top-nav-item account-section" id='not-login'>
          <div class="top-nav-item">
            <a href="sign-up.php">Sign up</a>
          </div>
          <div class="top-nav-item">
            <a href="login.php">Login</a>
          </div>
        </div>
        <!-- Nav Bar When Logged in-->
        <div class="top-nav-item account-section" id='logined'>
          <div class="cart-quantity-top">
            <a href="cart.php" class="title-with-icon heading-3 icon-cart">Cart: 3</a>
          </div>

          <div class="dropDown">

            <button class="dropbtn">
              <div class="login-wrapper">
                <div class="icon-pic profile-picture"></div>
                <p class="heading-3"> <span class="hello"> Hello </span>
                  <!-- check if user login, if so, display loign status, if not, display login / sign up link -->
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

    <footer>


    </footer>

    <!-- end of footer section -->

    <!-- script for log in form -->
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
