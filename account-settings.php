<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Account Settings</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/account-settings.css">
    <link rel="stylesheet" href="css/signup.css">

  </head>

  <body>
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

      <!-- start account setting content -->
      <div class="account-settings">
        <div class="user-overlay">
          <img class="user-pfp" src="img/account_photo.png" alt="Account User Profile Picture">
          <div class="user-info-wrapper">
            <div class="space-filler"></div>
            <div class="user-info">
              <p class="heading-1 tutor-name">
                <?php
                  // opening stored user info .txt file
                  $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");

                  // stating the deliminator
                  $d ='#KR#%5>DSG<)(E667)F?';

                  // change above step to session
                  $currentUser = $_SESSION['name'];

                  // to break out of loop if user is found
                  $userFound = "false";

                  while (!feof($handle)) {
                    // gets the current line of the .txt file
                    $currentLine = fgets($handle);

                    // removing the line break that fgets() creates
                    $user_data = explode($d, $currentLine);

                    // checking if first name is the user we're looking for
                    if ($user_data[2] == $_SESSION['name']) {
                        $userFound = "true";
                        echo $user_data[2] . " " . $user_data[3];
                        break;
                    }

                    // checking if user has been found; if true it will leave the while loop
                    if ($userFound == "true") {
                        break;
                    }

                    // storing user data as variables
                    $firstName = $user_data[2];
                    $lastName = $user_data[3];
                    $email = $user_data[0];
                    $password = $user_data[1];

                    // echo $firstName . "<br>";
                    // echo $lastName . "<br>";
                    // echo $email . "<br>";
                    // echo $password . "<br>";

                    // letting system know no user has been found
                    if ($userFound != "true") {
                        // echo "User has not been found" . "<br>";
                    }
                  }

                  // closing .txt files
                  fclose($handle);
                  //fclose($devider_file);
                ?>
              </p>
              <p class="body-tex tutor-spec">Math Tutor (K-12)</p>
            </div>
          </div>

        </div>

        <p class="title-with-icon heading-1 icon-setting">Account Settings</p>

        <div class="account-content">

          <!-- left side of account settings page -->
          <div class="account-content-split">
            <?php
              $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");

              // echo $currentUser . "<br>";

              $userFound = "false";

              while (!feof($handle)) {
                // gets the current line of the .txt file
                $currentLine = fgets($handle);

                // removing the line break that fgets() creates
                $user_data = explode($d, $currentLine);

                // checking if first name is the user we're looking for
                if ($user_data[2] == $_SESSION['name']) {
                    $userFound = "true";

                    // current user data; being retried and displayed
                    echo '<div class="info-element-container">';
                    echo '<p class="heading-3">Current Name</p>';
                    echo '<p class="body-text">' . $user_data[2] . ' ' . $user_data[3] . '</p>';
                    echo '</div>';

                    echo '<div class="info-element-container">';
                    echo '<p class="heading-3">Current Email</p>';
                    echo '<p class="body-text">' . $user_data[0] . '</p>';
                    echo '</div>';

                    echo '<div class="info-element-container">';
                    echo '<p class="heading-3">Current Password</p>';
                    echo '<p class="body-text">';

                    // getting password length and displaying it's length in '*'s
                    $passwordLength = strlen($user_data[1]);

                    for ($i = 0; $i < $passwordLength; $i++) {
                      echo '*';
                    }

                    echo '</p>';
                    echo '</div>';
                    break;
                }

                // checking if user has been found; if true it will leave the while loop
                if ($userFound == "true") {
                    break;
                }

                // storing user data as variables
                $firstName = $user_data[2];
                $lastName = $user_data[3];
                $email = $user_data[0];
                $password = $user_data[1];

                // echo $firstName . "<br>";
                // echo $lastName . "<br>";
                // echo $email . "<br>";
                // echo $password . "<br>";

                // letting system know no user has been found
                if ($userFound != "true") {
                    // echo "User has not been found" . "<br>";
                }
              }

              // closing .txt files
              fclose($handle);
            ?>
          </div>

          <!-- right side of account settings page -->
          <div class="account-content-split">

            <!-- form allows for user to update the account info -->
            <!-- current password and new password is required to update any information -->
            <form id="edit-account-form" action="update-account.php" method="post">
              <div class="form-group">
                <label for="fname-edit" class="form-label"> First Name </label>
                <input type="text" name="fname-edit" id="fname-edit" class="text-box" placeholder="John">

                <label for="lname-edit" class="form-label"> Last Name </label>
                <input type="text" name="lname-edit" id="lname-edit" class="text-box" placeholder="Doe">

                <label for="email-edit" class="form-label"> Email </label>
                <input type="text" name="email-edit" id="email-edit" class="text-box" placeholder="you@example.com">

                <label for="current-password-input" class="form-label"> Current Password </label>
                <a class="form-reveal" href="#" onclick="show('current-password-input')"> Show </a>
                <input type="password" name="current-password-input" id="current-password-input" class="text-box" placeholder="Enter your new password" required>

                <label for="password-edit-input" class="form-label"> New Password </label>
                <a class="form-reveal" href="#" onclick="show('password-edit-input'), show('password-confirm-input')"> Show </a>
                <input type="password" name="password-edit-input" id="password-edit-input" class="text-box" placeholder="Enter your new password" required>

                <label for="password-confirm-input" class="form-label"> Confirm Password </label>
                <input type="password" name="password-confirm-input" id="password-confirm-input" class="text-box" placeholder="Enter your new password" required>

                <!-- on submit sends runs update-account.php -->
                <div class="form-submit">
                  <input type="submit" name="edit-account-submit" id="edit-account-submit" value="Update" class="button-default">
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>

      <!-- end account setting  content -->

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

    <!-- script for form -->
    <script type="text/javascript">
      var password = document.getElementById("password-edit-input"),
          confirm_password = document.getElementById("password-confirm-input");

      password.onchange = function() {validatePassword();};
      confirm_password.onkeyup = function() {validatePassword();};

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      function show(id) {
        event.preventDefault();

        var x = document.getElementById(id);

        if (x.type == "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }

        return false;
      }


    </script>
    <!-- end script for form -->


  </body>
</html>
