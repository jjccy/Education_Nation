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
      <?php
      if (!isset($_COOKIE['isTutor'])) {
        echo "<a href='cart.php' class='title-with-icon heading-3 icon-cart'>Cart: 3</a>";
      }
       ?>
    </div>

    <div class="dropDown">

      <!-- check if user login, if so, display loign status, if not, display login / sign up link -->
      <?php


        if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true) {
            $connection = mysqli_connect("localhost", "root", "", "terence_liu");
            $profileImage = mysqli_fetch_array(mysqli_query($connection, "SELECT member.profile_address FROM member
                                                                          WHERE member.m_id = " .  $_COOKIE['m_id']))[0];

            mysqli_close($connection);

            if ($profileImage == null) {
              $profileImage = "img/member/default.jpg";
            }

            echo "<script language='javascript'>
                    document.getElementById('logined').classList.add('display');
                  </script>";

        } else {
          echo "<script language='javascript'>
                  document.getElementById('not-login').classList.add('display');
                </script>";
        }
      ?>

      <button class="dropbtn">
        <div class="login-wrapper">
          <div class="icon-pic profile-picture" style="background-image:url(<?php echo $profileImage?>)"></div>
            <p class="heading-3"> <span class="hello"> Hello </span>
            <?php echo $_COOKIE['name']?>
           </p>
          <div class="icon-caret"></div>
        </div>

      </button>

      <div class="dropdown-content">

        <a href="logOut.php">Log out</a>
        <a href="account-settings.php">Account Setting</a>

        <?php
        if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true && isset($_COOKIE['isTutor'])) {
            echo "<a href='tutor_courses-create.php'>Create new course</a>";
        }
         ?>
      </div>

    </div>
    <!-- end login-wrapper -->

  </div>
  <!-- end  logined section-->



</div>
<!-- ends top nav -->
