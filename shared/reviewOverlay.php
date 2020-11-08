<div class="overlay" id="reviewOverlay">
  <div class="overlay-body">
    <a href="#" id='closeButton' onclick="closeOverlay(reviewOverlay)"></a>

    <form class="post-review" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <p class='heading-1'><?php echo (isset($tutorID) ? "$tutorfname $tutorlname" : "Susan White"); ?></p>

      <!-- rating and course selection -->
      <div class="flex-box">
        <p class="body-text rating-text" id='rating-text'>0.0</p>
        <div class="rate">
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="text">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" title="text">4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" title="text">3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" title="text">2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="text">1 star</label>
        </div>

        <div class="max-flex-box-item"></div>

        <!-- display select course -->
        <select name="selectCourse" id="selectCourse">
        </select>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function closeOverlay(inputId) {
    event.preventDefault();

    document.getElementById(inputId.id).style.zIndex = "-100";
    document.getElementById(inputId.id).style.opacity = "0";

    return false;
  }
</script>
