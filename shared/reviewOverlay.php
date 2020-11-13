<div class="overlay" id="reviewOverlay">
  <div class="overlay-body">
    <a href="#" id='closeButton' onclick="closeOverlay(reviewOverlay)"></a>

    <form class="post-review" action="addReview.php" method="post">
      <!-- hidden input to send current  -->
      <input type="hidden" name="currentPage" value="<?php echo "$_SERVER[REQUEST_URI]"; ?>">
      <input type="hidden" name="tutorID" value="<?php echo $tutorID ?>">


      <p class='heading-1'><?php echo (isset($tutorID) ? "$tutorfname $tutorlname" : "Susan White"); ?></p>

      <!-- rating and course selection -->
      <div class="flex-box">
        <p class="body-text rating-text" id='rating-text'>0</p>
        <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" onClick="setRating(5)"/>
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" onClick="setRating(4)"/>
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" onClick="setRating(3)"/>
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" onClick="setRating(2)"/>
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" onClick="setRating(1)"/>
          <label for="star1" title="text">1 star</label>
        </div>

        <div class="max-flex-box-item"></div>

        <!-- display select course -->
        <select name="selectCourse" id="selectCourse">
          <option value="-99">Select Course</option>
          <?php
          $connection = mysqli_connect("localhost", "view", "", "terence_liu");
          $courseName= mysqli_query($connection, "SELECT course.subject_name, course.c_id
                                                  FROM course
                                                  WHERE $tutorID = course.tutor_id");
          //if course name query does not work die
          if (!$courseName) {
            die("get course name fail");
          }

          // echo every single course
          while ($row = mysqli_fetch_assoc($courseName))
          {
            echo "<option value='" . $row['c_id'] ."'>" . $row['subject_name'] . "</option>";
          }
          // release database connection and results
          mysqli_free_result($courseName);
          mysqli_close($connection);
           ?>
        </select>
      </div>
      <!--Text area to input review-->
      <textarea name='comment'>Enter your review here ...</textarea>
      <!--Submit review button-->
      <input type="submit" name="submitReview" value="Submit Review">
    </form>
  </div>
</div>


<script type="text/javascript">
  // function to close the overlay modal
  function closeOverlay(inputId) {
    event.preventDefault();

    document.getElementById(inputId.id).style.zIndex = "-100";
    document.getElementById(inputId.id).style.opacity = "0";

    return false;
  }
  // function to set the rating
  function setRating(rate) {
    document.getElementById('rating-text').innerHTML = rate;
  }
</script>
