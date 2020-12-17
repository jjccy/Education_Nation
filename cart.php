<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>

  <body>
    <?php include('shared/responsive-nav.php'); ?>
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

      <!-- start cart section -->
      <div class="cart-section">
        <div class="cart-container">
          <div class="cart-content">
            <!-- Cart with icon header  -->
            <p class="title-with-icon heading-1 icon-briefcase">Cart</p>
            <!-- <p class="cart-quantity">3 Items</p> -->

            <!-- Cart items container  -->
            <div class="cart-item-container">

              <?php

              $subtotal = 0;

              // if there are stuff in cart
              if ($inCart > 0) {
                $connection = mysqli_connect("localhost", "view", "", "terence_liu");
                if(mysqli_connect_errno()) {
                  // if fail, skip all php and print errors

                  die("Database connet failed: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno(). ")"
                  );
                }

                // get all carts for this student
                $query = "SELECT cartadd.cart_id, member.fname, member.lname, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.price
                          FROM cartadd INNER JOIN course on cartadd.c_id = course.c_id
                          INNER JOIN member on course.tutor_id = member.m_id
                          WHERE cartadd.student_id = " .  $_SESSION['m_id'];

                $cartList = mysqli_query($connection, $query);

                if (!$cartList) {
                    die("get cart failed: " . mysqli_error($connection));
                }

                // print each tutor from list
                while ($row = mysqli_fetch_array($cartList))
                {
                  // get profile address;
                  $profileImage = $row['profile_address'];
                  if ($profileImage == null) {
                    $profileImage = "img/member/default.jpg";
                  }

                  // get course detail information;
                  $tutorfame = $row['fname'];
                  $tutorlame = $row['lname'];
                  $courseName = $row['subject_name'];
                  $minGrade = ($row['min_grade'] == 0) ? "K" : $row['min_grade'];
                  $maxGrade = $row['max_grade'];
                  $price = $row['price'];
                  $subtotal += $row['price'];
                  $cartID = $row['cart_id'];

                  ($minGrade === 0) ? $minGrade = "K" : true;


                  // print the course card
                  echo"<div class='cart-item'>
                        <div class='card-container'>
                          <img src='$profileImage' alt='$tutorfame Profile Picture'>
                          <div class='remove-button' id='$cartID' onclick='removeItem($cartID)'></div>
                          <div class='info-wrapper'>
                            <div class='card-info'>
                              <p class='heading-4'>$tutorfame $tutorlame</p>
                              <p class='body-text tutor-spec'>$courseName | $minGrade - $maxGrade</p>
                              <p class='heading-4 tutor-price'>$$price</p>
                            </div>
                          </div>
                        </div>
                      </div>";
                }

                // release returned data
                mysqli_free_result($cartList);
                mysqli_close($connection);
              }
              else { // else display something
                echo "<p class='heading-4'>Nothing in your cart yet</p>";
              }


               ?>

               <!-- cart cousre cart example format -->
              <!-- <div class="cart-item">
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
              </div> -->




            </div> <!-- End Cart items container  -->
          </div> <!-- End Cart content -->

          <!-- Billing, payment total and checkout summary -->
          <div class="cart-detail">
            <div class="cart-info">
              <div class="billing-info">
                <p class="heading-3 cart-info-heading"> Billing Information</p>
                <p class="body-text bill-name">
                  <?php echo $_SESSION['name'] . " " . $_SESSION['lname']; ?>
                </p>
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
                <p class="body-text">
                  <?php echo "$" . $subtotal . ".00" ?>
                </p>
              </div>

              <div class="breakdown-item breakdown-tax">
                <p class="body-text">Taxes:</p>
                <p class="body-text">
                  <?php echo "$" . $subtotal*0.12 ?>
                </p>
              </div>

              <div class="breakdown-item breakdown-total">
                <p class="heading-3 cart-info-heading">Total:</p>
                <p class="heading-3 cart-info-heading">
                  <?php echo "$" . $subtotal*1.12 ?>
                </p>
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
    <?php include('shared/footer.php'); ?>

    <!-- end of footer section -->

    <script src="js/script.js"></script>

    <script>
      function removeItem(cart_id) {
        let target = 'removeCartItem.php';
        let url = target + '?cartid=' + cart_id;

        window.location.href = url;
      }
    </script>

  </body>
</html>
