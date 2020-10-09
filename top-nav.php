<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>top nav template</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
  </head>

  <body>

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
          <p class="title-with-icon heading-3 icon-cart">Cart: 3</p>
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


    <!-- footer starts here -->

    <footer>


    </footer>

    <!-- end of footer section -->

  </body>
</html>
