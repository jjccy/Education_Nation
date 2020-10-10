<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Contact Us</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/contact.css">

  </head>

  <body>
    <!-- start body wrapper -->
    <div class="body-wrapper">

    <!-- start of chat module -->
    <div class="iframe-wrapper">
      <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
    </div>
    <!-- end of chat module -->

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

      <!-- start contact page -->
      <div class="contact-page">

        <!-- contact form section -->
          <div class="contact-page-item contact-form">
          <p class="title-with-icon heading-1 icon-contact">Contact us</p>

            <form id="contact-form" action="#" method="post">
              <div class="form-group">
                <label for="name-input" class="form-label"> Full Name </label>
                <input type="text" name="name-input" id="name-input" class="text-box" placeholder="John Doe" required>
                <label for="email-input" class="form-label"> Email </label>
                <input type="text" name="email-input" id="email-input" class="text-box" placeholder="Enter your email"required>
                <div>
                  <label for="message-input" class="form-label">Message</label>
                  <textarea name="message-input" id="message-input" class="text-area" placeholder="Enter your message here..." required></textarea>
                </div>
                <div class="form-submit">
                  <input type="submit" name="form-submit" id="form-submit" value="Send" class="button-default">
                </div>
              </div>
            </form>
          </div>
          <div class="contact-page-filler"></div>

        <!-- end contact form section -->
        <div class="contact-info">
          <p class="heading-2">Contact information</p>
          <p class="body-text">Fill up the form and our Team will get back to you within 2 business days.</p>
          <p class="title-with-icon heading-3 icon-phone">+1 123.456.7890</p>
          <p class="title-with-icon heading-3 icon-email">help@educationnation.com</p>
          <p class="title-with-icon heading-3 icon-location">123 4th Avenue Vancouver, Canada</p>
          <div class="contact-page-filler"></div>
          <div class="social-media">
            <a href="#"><img src="img/Facebook.svg" alt="Facebook Logo">
            <a href="#"><img src="img/Linkedin.svg" alt="Linkedin Logo">
            <a href="#"><img src="img/Instagram.svg" alt="Instagram Logo">
            <a href="#"><img src="img/Twitter.svg" alt="Twitter Logo">
          </div>
        </div>

      </div>
      <!-- end contact page content -->

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

    <script src="js/script.js"></script>

  </body>
</html>
