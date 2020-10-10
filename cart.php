<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Cart</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/cart.css">
  </head>

  <body>
    <!-- start of background -->
    <div class="cart-detail-background">
    </div>
    <!-- end of background -->

    <!-- start of chat module -->
    <!-- using iframe to embed help module, hence only needing to mod this from one file -->
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

      <!-- start cart section -->
      <div class="cart-section">
        <div class="cart-container">
          <div class="cart-content">
            <!-- Cart with icon header  -->
            <p class="title-with-icon heading-1 icon-briefcase">Cart</p>
            <!-- <p class="cart-quantity">3 Items</p> -->

            <!-- Cart items container  -->
            <div class="cart-item-container">
              <div class="cart-item">
                <div class="card-container">
                  <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                  <div class="info-wrapper">
                    <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <p class="heading-4 tutor-price">$22</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cart-item">
                <div class="card-container">
                  <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                  <div class="info-wrapper">
                    <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <p class="heading-4 tutor-price">$22</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cart-item">
                <div class="card-container">
                  <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                  <div class="info-wrapper">
                    <div class="card-info">
                      <p class="heading-4">Susan White</p>
                      <p class="body-text tutor-spec">Grade 9 - Math</p>
                      <p class="heading-4 tutor-price">$22</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Billing, payment total and checkout summary -->
          <div class="cart-detail">
            <div class="cart-info">
              <div class="billing-info">
                <p class="heading-3 cart-info-heading"> Billing Information</p>
                <p class="body-text bill-name">Jennifer Salong</p>
                <p class="body-text bill-address">1234 Alphabet Street, Vancouver, BC, V5A 1A1</p>
                <p class="body-text bill-phone-num">604.111.1111</p>
              </div>
              <a href="#" class="icon-edit"></a>
            </div>

            <div class="cart-info">
              <div class="payment-info">
                <p class="heading-3 cart-info-heading"> Payment</p>
                <p class="body-text card-number">**** **** **** 1234</p>
                <p class="body-text card-exp">01/22</p>
                <p class="body-text card-cvc">123</p>
              </div>
              <a href="#" class="icon-edit"></a>
            </div>

            <div class="cart-payment-breakdown">
              <div class="breakdown-item breakdown-subtotal">
                <p class="body-text">Subtotal:</p>
                <p class="body-text">$66.00</p>
              </div>

              <div class="breakdown-item breakdown-tax">
                <p class="body-text">Taxes:</p>
                <p class="body-text">$4.00</p>
              </div>

              <div class="breakdown-item breakdown-total">
                <p class="heading-3 cart-info-heading">Total:</p>
                <p class="heading-3 cart-info-heading">$70.00</p>
              </div>
            </div>

            <a href="#" class="btn place-order">Place Order</a>

          </div>
        </div>
      </div>
      <!-- end cart section -->




    </div>
    <!-- end body wrapper -->







    <!-- footer starts here -->

    <footer>


    </footer>

    <!-- end of footer section -->

    <script src="js/script.js"></script>

  </body>
</html>
