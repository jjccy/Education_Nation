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
    <?php include('shared/checkLogin.php'); ?>
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

      <!-- start account setting about content -->
      <div class="account-settings">
        <div class="account-settings-container">
          <?php include('shared/account-settings-userOverlay.php'); ?>

          <div class="account-settings-header">
            <div class="heading-spacer"></div>
            <div class="header-wrapper">
              <p class="title-with-icon heading-1 icon-star">Reviews</p>
            </div>
            <!-- <div class="space-filler"></div> -->
          </div>

          <div class="account-content">

            <?php include('shared/account-settings-menu.php'); ?>

            <div class="account-setting-list">
              <?php
                date_default_timezone_set("America/Vancouver");
                // function to convert time stamp to days ago.
                function time_elapsed_string($datetime, $full = false) {

                    $now = new DateTime;
                    $ago = new DateTime($datetime);
                    $diff = $now->diff($ago);

                    $diff->w = floor($diff->d / 7);
                    $diff->d -= $diff->w * 7;

                    $string = array(
                        'y' => 'year',
                        'm' => 'month',
                        'w' => 'week',
                        'd' => 'day',
                        'h' => 'hour',
                        'i' => 'minute',
                        's' => 'second',
                    );
                    foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                            unset($string[$k]);
                        }
                    }

                    if (!$full) $string = array_slice($string, 0, 1);
                    return $string ? implode(', ', $string) . ' ago' : 'just now';
                }

                // get database
                $connection = mysqli_connect("localhost", "root", "", "terence_liu");

                if(mysqli_connect_errno()) {
                // if fail, skip all php and print errors

                die("Database connection failed: " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno(). ")"
                );
                }

                // change above step to session
                $currentUser = $_COOKIE['m_id'];

                $query = "SELECT * FROM review INNER JOIN member WHERE review.tutor_id = '$currentUser' AND member.m_id = review.student_id";

                // get result from database;
                $result = mysqli_query($connection, $query);

                if (!$result) {
                die('database query failed');
                }

                while ($row = $result -> fetch_assoc()) {
                    $comment = $row['comments'];
                    $rating = $row['rating'];
                    $date = $row['date_posted'];
                    $name = $row['fname'] . " " . $row['lname'];
                    $image = $row['profile_address'];

                    echo '<div class="list-card">';
                        echo '<div class="card-img">';
                        echo '<img class="user-pfp" src="';
                        echo $image;
                        echo '" alt="Account User Profile Picture">';
                        echo '</div>';
                        echo '<div class="card-content-container">';
                        echo '<div class="card-content">';
                            echo '<div class="card-header">';
                            echo '<div class="card-title">';
                                echo '<p class=heading-1>';
                                echo $name;
                                echo '</p>';
                            echo '</div>';

                            echo '<div class="card-rating">';
                              echo "<div class='Stars post' style='--rating: ". $rating .";' aria-label='Rating of this product is ". $rating ." out of 5.'></div>";
                            echo '</div>';

                            echo '<div class="card-date">';
                                echo '<p class="heading-3">';
                                echo time_elapsed_string($date);
                                echo '</p>
                            </div>';

                            echo '</div>
                            <div class="card-detail">
                            <p class="body-text">';
                                echo $comment;
                            echo '</p>
                            </div>
                        </div>
                        </div>
                    </div>';
                }

                mysqli_free_result($result);
              ?>
            </div>
          </div>
        </div>
      </div>

      <!-- end account setting  about content -->

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


    <script src="js/script.js"></script>

  </body>
</html>
