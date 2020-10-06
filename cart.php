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
      <div class="cart-detail-top">
        <div class="cart-quantity-top">
          <p class="title-with-icon heading-3 icon-cart">Cart: 3</p>
        </div>
        <a href="#"class="login-wrapper">
          <div class="icon-pic profile-picture"></div>
          <p class="heading-3"> Hello Jennifer</p>
          <div class="icon-caret"></div>
        </a>
      </div>
    </div>
    <!-- end of background -->

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

      <!-- start cart section -->
      <div class="cart-section">
        <div class="cart-container">
          <div class="cart-content">
            <p class="title-with-icon heading-1 icon-briefcase">Cart</p>
            <!-- <p class="cart-quantity">3 Items</p> -->

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

  </body>
</html>
