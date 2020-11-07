<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>About</title>

    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/about.css">
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

      <!-- start about page -->
      <div class="about-page">

        <!-- about title section -->
        <div class="about-title">

          <div class="about-title-item">
            <p class="title-with-icon heading-1 icon-about">About us</p>
            <img src="img/About_Banner.png" alt="Image of Office">
            <!--About content section-->
            <p class="body-text">At Education Nation, we are striving to create an environment solely to connect well-qualified tutors with children from elementary school to high school. This platform allows students and parents to browse and filter for tutors that meet their needs and standards. Students will be able to find tutors for different age groups, subjects, pricing, and ratings. </p>
            <p class="body-text">If you are a tutor, and would like to apply for a position at Education Nation apply now! We will review your application within 2 business days, and will contact you if we find that you are a good fit for our team.</p>
            <p class="body-text">Education Nation was founded by 3 students studying at Simon Fraser University during COVID-19. They saw that there was a need for a platform that helped connect students with tutors, during the pandemic, especially since teachers and help are not as accessible online. Having access to tutors will help students keep up with their homework and tests, while also helping tutors find more clients. </p>
            <!--End of About content section-->
          </div>

          <!-- <div class="max-flex-box-item"></div> -->

            <div class="about-title-item">
              <img src="img/About_Model.png" alt="Image of girl">
            </div>
        </div>

      </div>
      <!-- end about page content -->

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

    <script src="js/script.js"></script>

  </body>
</html>
