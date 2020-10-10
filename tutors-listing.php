<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Tutor List</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/tutorListing.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  </head>

  <body>
    <!-- background -->
    <div class="background"></div>

    <!-- start of chat module -->
    <iframe class="help-iframe" id="iframeHelp" src="help-overlay.php" frameborder="0"></iframe>
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

      <!-- start tutor list -->
      <section class="tutor-list">

        <!-- list title section -->
        <div class="list-title">

          <div class="list-title-item">
            <p class="title-with-icon heading-1 icon-tutors">All Tutors</p>
          </div>

          <div class="max-flex-box-item"></div>

          <div class="list-title-item">

            <!-- starting sort and filter -->

            <div class="dropdown">
              <button class="dropbtn">
                <img src="img/Tutors_Sort.svg" alt="sort icon">
                Sort
              </button>

              <div class="dropdown-content">
                <a href="#" id="top-rate">Top Rated</a>
                <a href="#" id="a-z">A - Z</a>
                <a href="#" id="z-a">Z - A</a>
                <a href="#" id="price-high">Price: High - Low</a>
                <a href="#" id="price-low">Price: Low - High</a>
              </div>
            </div>

            <div class="dropdown">
              <button class="dropbtn" id="adjust-filter">
                <img src="img/Tutors_Filter.svg" alt="filter icon">
                Filter
              </button>
            </div>

            <!-- end sort and filter -->

          </div>

        </div>
        <!-- end list title -->

        <!-- start list contents -->
        <div class="list-contents">

          <div class="filter-popout hide">
            <div class="group">

              <label class="container">Math
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="container">English
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="container">French
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="container">Science
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
              <label class="container">History
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
            </div>

            <!-- two side slide bar -->

            <div class="group">
              <p class="heading-2">
                <label for="amount">Grade:</label>
                <input type="text" id="amount" readonly>
              </p>

              <div id="slider-range"></div>
            </div>
          </div>

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


            <!-- many max flex box make sure all cards are same width -->

            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>
            <div class="max-flex-box-item"></div>


          </div>
          <!-- end cards wrapper -->
        </div>
        <!-- end list contents -->



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

    <!-- script for slider -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/tutorListing.js"></script>
    <!-- end script for slider -->

  </body>
</html>
