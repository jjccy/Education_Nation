<!-- start top nav -->
<div class="top-nav">

  <div class="top-nav-item logo">
    <a href="index.php"><img src="img/Logo.svg" alt="Logo image"></a>
  </div>

  <div class="top-nav-item">
    <div class="searchbar">
        <button type="submit" name="search" aria-label="search-button" onClick="search_function()"></button>
        <input type="search" id="searchbar" name="search" aria-label="search" placeholder="Search for tutors or subjects..." onkeydown="key_down()">
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
      <!-- check if user login, if so, display loign status, if not, display login / sign up link -->
      <?php
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
      }

      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          $connection = mysqli_connect("localhost", "view", "", "terence_liu");
          $profileImage = mysqli_fetch_array(mysqli_query($connection, "SELECT member.profile_address FROM member
                                                                        WHERE member.m_id = " .  $_SESSION['m_id']))[0];

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

      // if login as a tutor
      if (!isset($_SESSION['isTutor']) || !$_SESSION['isTutor']) {
        // get number of course in cart
        $inCart = (mysqli_query($connection, "SELECT cartadd.student_id FROM cartadd WHERE cartadd.student_id = " .  $_SESSION['m_id'])->num_rows);

        echo "<a href='cart.php' class='title-with-icon heading-3 icon-cart'>Cart: $inCart</a>";
      }
      mysqli_close($connection);
       ?>
    </div>

    <div class="dropDown">
      <button class="dropbtn">
        <div class="login-wrapper">
          <div class="icon-pic profile-picture" style="background-image:url(<?php echo $profileImage?>)"></div>
            <p class="heading-3"> <span class="hello"> Hello </span>
            <?php echo $_SESSION['name']?>
           </p>
          <div class="icon-caret"></div>
        </div>

      </button>

      <div class="dropdown-content">

        <a href="logOut.php">Log out</a>
        <a href="account-settings.php">Account Setting</a>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isTutor']) {
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

<script>
  function key_down(e) {
    e = e || window.event;
    if(e.keyCode === 13) {
      search_function();
    }
  }

  function search_function() {
    var inputText = document.getElementById("searchbar").value;
    let url = 'tutors-listing.php?searchInput=' + inputText;

    // alert("searching: " + url);

    window.location.href=url;
  }
</script>
