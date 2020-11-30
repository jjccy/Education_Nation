<?php
    // check if session start has been called
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // returns true means user is a tutor
    if (isset($_SESSION['isTutor']) && $_SESSION['isTutor']) { ?>
        <!-- menu for tutor -->
        <div class="account-menu">
            <div class="account-menu-container">
                <a href="account-settings.php" class="title-with-icon body-text icon-setting account-setting-menu" id="account-setting-link">Account Settings</a>
                <a href="tutor_upcoming-booking.php" class="title-with-icon body-text icon-clock account-setting-menu" id="upcoming-booking-link">Upcoming Bookings</a>
                <a href="tutor_about-me.php" class="title-with-icon body-text icon-tutor-about account-setting-menu" id="about-me-link">About Me</a>
                <a href="tutor_availability.php" class="title-with-icon body-text icon-calendar account-setting-menu" id="availability-link">Availability</a>
                <a href="tutor_booking-history.php" class="title-with-icon body-text icon-booking-history account-setting-menu" id="booking-history-link">Booking History</a>
                <a href="tutor_reviews.php" class="title-with-icon body-text icon-star account-setting-menu" id="reviews-link">Reviews</a>
                <a href="tutor_courses.php" class="title-with-icon body-text icon-award account-setting-menu" id="courses-link">Courses</a>
            </div>
        </div>
    <?php }
    else { ?>
        <!-- menu for student -->
        <div class="account-menu">
            <div class="account-menu-container">
                <a href="account-settings.php" class="title-with-icon body-text icon-setting account-setting-menu" id="account-setting-link">Account Settings</a>
                <a href="tutor_upcoming-booking.php" class="title-with-icon body-text icon-clock account-setting-menu" id="upcoming-booking-link">Upcoming Bookings</a>
                <a href="tutor_booking-history.php" class="title-with-icon body-text icon-booking-history account-setting-menu" id="booking-history-link">Booking History</a>
                <a href="student_personalization.php" class="title-with-icon body-text icon-customize account-setting-menu" id="personalization-link">Personalization</a>
            </div>
        </div>
    <?php } ?>

<script>
    // gets current page url
    var current_url = window.location.pathname;

    // getting links from account settings menu
    var account_settings = document.getElementById("account-setting-link");
    var upcoming_booking = document.getElementById("upcoming-booking-link");
    var about_me = document.getElementById("about-me-link");
    var availability = document.getElementById("availability-link");
    var booking_history = document.getElementById("booking-history-link");
    var reviews = document.getElementById("reviews-link");
    var courses = document.getElementById("courses-link");
    var personalization = document.getElementById("personalization-link");

    // removing all of the 'title-active' class on the links
    account_settings.classList.remove("title-active");
    upcoming_booking.classList.remove("title-active");
    about_me.classList.remove("title-active");
    availability.classList.remove("title-active");
    booking_history.classList.remove("title-active");
    reviews.classList.remove("title-active");
    courses.classList.remove("title-active");
    personalization.classList.remove("title-active");

    // checking if the current page matches any of the links, if so then set active state to that link
    if (current_url.includes("account-settings")) {
        account_settings.classList.add("title-active");
    }

    else if (current_url.includes("upcoming-booking")) {
        upcoming_booking.classList.add("title-active");
    }

    else if (current_url.includes("about-me")) {
        about_me.classList.add("title-active");
    }

    else if (current_url.includes("availability")) {
        availability.classList.add("title-active");
    }

    else if (current_url.includes("booking-history")) {
        booking_history.classList.add("title-active");
    }

    else if (current_url.includes("reviews")) {
        reviews.classList.add("title-active");
    }

    else if (current_url.includes("courses")) {
        courses.classList.add("title-active");
    }

    else if (current_url.includes("personalization")) {
        personalization.classList.add("title-active");
    }
</script>
