<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Tutor List</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/tutorListing.css">
  </head>

  <body>
    <!-- background -->
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
            <a href="help.php" class="icon-help">Help Center</a>
        </div>

      </div>
      <!-- end side nav -->

      <!-- start tutor list -->
      <section class="tutor-list">

        <!-- list title section -->
        <div class="list-title">

          <div class="list-title-item">
            <p class="title-with-icon heading-1 icon-tutors">All Tutors</p>
          </div>

          <div class="max-flex-box-item"></div>

          <div class="list-title-item">

            <div class="dropdown">
              <button class="dropbtn">
                <img src="img/Tutors_Sort.svg" alt="sort icon">
                Sort
              </button>

              <div class="dropdown-content">
                <a href="#">Rate</a>
                <a href="#">Subject</a>
                <a href="#">Price</a>
                <a href="#">Age</a>
                <a href="#">Alphabetical</a>
              </div>
            </div>

            <div class="dropdown">
              <button class="dropbtn">
                <img src="img/Tutors_Filter.svg" alt="filter icon">
                Filter
              </button>

              <div class="dropdown-content">
                <a href="#">Should</a>
                <a href="#">filter</a>
                <a href="#">be</a>
                <a href="#">check</a>
                <a href="#">box</a>
              </div>
            </div>

          </div>

        </div>
        <!-- end list title -->


        <!-- cards wrapper -->
        <div class="cards-wrapper">

          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>

          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>


          <div class="card-container">
              <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
              <div class="info-wrapper">
                  <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <a href="tutor-detail.php" class="btn">See More</a>
                  </div>
              </div>
          </div>

          <div class="max-flex-box-item"></div>


        </div>
        <!-- end cards wrapper -->

        <!-- list buttons -->

        <div class="list-buttons">
          <div class="max-flex-box-item"></div>

          <a href="#" class="arrow-btn" id="left">
            <p>&#8592;</p>
          </a>
          <div class="page-number">
            <p class="body-text" id="currentPage">01</p>
            <p class="body-text"> / </p>
            <p class="body-text" id="totalPage">04</p>
          </div>
          <a href="#" class="arrow-btn active" id="right">
            <p>&#8594;</p>
          </a>

          <div class="max-flex-box-item"></div>
        </div>

        <!-- end list buttons -->



      </section>
      <!-- end tutor list -->

    </div>
    <!-- end body wrapper -->







    <!-- footer starts here -->

    <footer>


    </footer>

    <!-- end of footer section -->

  </body>
</html>
