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
                <a href="#" id="top-rate" onclick="sortBy('rate')">Top Rated</a>
                <a href="#" id="a-z" onclick="sortBy('a-z')">A - Z</a>
                <a href="#" id="z-a" onclick="sortBy('z-a')">Z - A</a>
                <a href="#" id="price-high" onclick="sortBy('price-high')">Price: High - Low</a>
                <a href="#" id="price-low" onclick="sortBy('price-low')">Price: Low - High</a>
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

              <?php
              // Connect to database using view privilege
              $connection = mysqli_connect("localhost", "view", "", "terence_liu");
              //Check if database connection was a success or not
              if(mysqli_connect_errno()) {
                // if fail, skip all php and print errors
                die("Database connect failed: " .
                  mysqli_connect_error() .
                  " (" . mysqli_connect_errno(). ")"
                );
              }
              $allCoursesOption = mysqli_query($connection, "SELECT DISTINCT course.subject_name
                                                                        FROM course
                                                                        ORDER BY course.subject_name");


              if (!$allCoursesOption) {
                die("get all course option fail");
              }

              // echo every single course
              while ($row = mysqli_fetch_assoc($allCoursesOption))
              {
                $coursename = $row['subject_name'];

                echo "<label class='container'>$coursename
                        <input type='checkbox' id='courses' name='courses[]' checked='checked' value='$coursename' onclick='courseSelect()'>
                        <span class='checkmark'></span>
                      </label>";
              }

              mysqli_free_result($allCoursesOption);
              mysqli_close($connection);

               ?>

              <!-- check box template -->
              <!-- <label class='container'>Math
                <input type='checkbox' checked='checked'>
                <span class='checkmark'></span>
              </label> -->

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
          <div class="cards-wrapper" id='cardLists'>

            <?php
            $connection = mysqli_connect("localhost", "view", "", "terence_liu");
            if(mysqli_connect_errno()) {
              // if fail, skip all php and print errors

              die("Database connet failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno(). ")"
              );
            }

            $query = "SELECT member.fname, member.lname, tutor.tutor_id, member.profile_address, course.subject_name, course.min_grade, course.max_grade, course.c_id
                      FROM course INNER JOIN tutor ON tutor.tutor_id = course.tutor_id
                      INNER JOIN member ON course.tutor_id = member.m_id";

            // add search condition
            if (isset($_GET['searchInput'])) {
              $input = explode(" ", $_GET['searchInput']);

              $query .= " WHERE tutor.tutor_id < 0";

              foreach ($input as &$value) {
                $query .= " OR UPPER(member.fname) like UPPER('%" . $value . "%')";
                $query .= " OR UPPER(member.lname) like UPPER('%" . $value . "%')";
                $query .= " OR UPPER(course.subject_name) like UPPER('%" . $value . "%')";
                // $query .= " OR UPPER(course.min_grade) like UPPER('%" . $value . "%')";
                // $query .= " OR UPPER(course.max_grade) like UPPER('%" . $value . "%')";
              }
            }

            $courseList = mysqli_query($connection, $query);

            if (!$courseList) {
                die("get tutorlist failed: " . mysqli_error($connection));
            }

            // if result is smaller than 1, tell user no found result
            if (1 > ($courseList->num_rows)) {
              echo "<p class='heading-4'>No Match result</p>";
            }

            // print each tutor from list
            while ($row = mysqli_fetch_array($courseList))
            {
              // get profile address;
              $profileImage = $row['profile_address'];
              if ($profileImage == null) {
                $profileImage = "img/member/default.jpg";
              }

              // get name and id;
              $tutorfame = $row['fname'];
              $tutorlame = $row['lname'];
              $tutorID = $row['tutor_id'];
              $courseID = $row['c_id'];
              $courseName = $row['subject_name'];
              $minGrade = ($row['min_grade'] == 0) ? "K" : $row['min_grade'];
              $maxGrade = $row['max_grade'];

              ($minGrade === 0) ? $minGrade = "K" : true;

              // send tutor id through url
              $url = "tutor-detail.php";
              $query = parse_url($url, PHP_URL_QUERY);

              // Returns a string if the URL has parameters or NULL if not
              if ($query) {
                  $url .= "&course_id=" . $courseID . "&tutor_id=" . $tutorID;
              } else {
                  $url .= "?course_id=" . $courseID . "&tutor_id=" . $tutorID;
              }



              // print the tutor card
              echo "<a href='$url' class='card-container'>";
              echo "<img src='$profileImage' alt='$tutorfame Profile Picture'>";
              echo "<div class='info-wrapper'>";
              echo "<div class='card-info'>";
              echo "<p class='heading-4'>$tutorfame $tutorlame</p>";
              echo "<p class='body-text tutor-spec'>$courseName | $minGrade - $maxGrade</p>";
              echo "</div>";
              echo "</div>";
              echo "</a>";


            }

            // release returned data
            mysqli_free_result($courseList);
            mysqli_close($connection);

             ?>

             <!-- content html example -->
            <!-- <div class="card-container">
                <img src="img/Tutor_PFP.png" alt="Tutor Profile Picture">
                <div class="info-wrapper">
                    <div class="card-info">
                        <p class="heading-4">Susan White</p>
                        <p class="body-text tutor-spec">Grade 9 - Math</p>
                        <a href="tutor-detail.php" class="btn">See More</a>
                    </div>
                </div>
            </div> -->

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

          <a href="#" class="arrow-btn" id="left" onClick="pagination(-1)">
            <p>&#8592;</p>
          </a>
          <div class="page-number">
            <p class="body-text" id="currentPage">01</p>
            <p class="body-text"> / </p>
            <p class="body-text" id="totalPage">04</p>
          </div>
          <a href="#" class="arrow-btn" id="right" onClick="pagination(1)">
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
    <?php include('shared/footer.php'); ?>

    <!-- end of footer section -->

    <!-- script for slider -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/tutorListing.js"></script>
    <!-- end script for slider -->

    <script src="js/script.js"></script>

  </body>
</html>
