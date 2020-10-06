<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Home</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/signup.css">

  </head>

  <body>
    <div class="background"></div>

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
              <input type="text" name="search" aria-label="search" placeholder="Search for tutors or subjects...">
          </div>
        </div>

        <div class="max-flex-box-item"></div>

        <div class="top-nav-item account-section">
          <div class="top-nav-item">
            <a href="sign-up.php">Sign up</a>
          </div>
          <div class="top-nav-item">
            <a href="login.php">Login</a>
          </div>
        </div>


      </div>
      <!-- ends top nav -->

      <!-- start sign up page -->
      <div class="signup-page">

        <!-- sign up form section -->
        <div class="signup-page-item">
          <div class="signup-form">
          <p class="title-with-icon heading-1 icon-enter">Sign up</p>
          <img src="img/Announcement_Banner.svg" alt="Announcements">
            <form id="contactForm" action="#" method="post">
              <div class="form-group">
                <label for="name-input" class="form-label"> Name </label>
                <input type="text" name="name-input" id="name-input" class="text-box" required>
                <label for="email-input" class="form-label"> Email </label>
                <input type="text" name="email-input" id="email-input" class="text-box" required>
                <div>
                  <label for="message-input" class="form-label">Message</label>
                  <textarea name="message-input" id="message-input" class="text-area" required></textarea>
                </div>

                <div class="g-recaptcha" data-sitekey="6Ld3Pr0UAAAAAJjAs5i5AZxv--FwfLyeb4RLngkY"></div>

                <div class="form-submit">
                  <input type="submit" name="form-submit" id="form-submit" value="Send" class="button-default">
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- end sign up form section -->

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

  </body>
</html>
