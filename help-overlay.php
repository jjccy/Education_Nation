<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">

    <title>Help Overlay</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/helpmodule.css">
</head>

<body>
    <!-- background -->
    <div class="background"></div>

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
                    <input type="text" name="search" aria-label="search" placeholder="Search for tutors or subjects...">
                </div>
            </div>

            <div class="max-flex-box-item"></div>

            <div class="top-nav-item account-section">
                <div class="top-nav-item">
                    <a href="sign-up.php">Sign up</a>
                </div>
                <div class="top-nav-item">
                    <a href="login.php">Login</a>
                </div>
            </div>


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
                <a href="help.php" class="icon-help">Help Center</a>
            </div>

        </div>
        <!-- end side nav -->

        <!-- start of chat module -->
        <div class="help-module">
            <div class="module-header">
                <p class="heading-4">Ask Us Anything!</p>
                <div class="module-header-icons">
                    <a href="#">
                        <div class="icon-more"></div>
                    </a>
                    <a href="#">
                        <div class="icon-close"></div>
                    </a>
                </div>
            </div>
            <div class="module-content">
                <div class="chat">
                    <div class="chat-icon">
                        <div class="icon-tutors"></div>
                    </div>
                    <div class="chat-content">
                        <div class="chat-sender">
                            <p class="body-text sender-text">EducBot</p>
                        </div>

                        <div class="chat-message">
                            <p class="body-text">
                                EducBot here! I'm EducationNation's automated messaging bot. <br>
                                <br> Do you want to know more about our services?
                            </p>
                        </div>
                    </div>
                </div>

                <div class="chat-auto-question">
                    <a href="#" class="body-text chat-question-text">
                        I'm new to EducationNation, I want to learn more!
                    </a>
                    <a href="#" class="body-text chat-question-text">
                        I'm an EducationNation memeber. I am seeking for assistance.
                    </a>
                </div>
            </div>

            <div class="module-input">
                <form action="" class="chat-input">
                    <textarea placeholder="Type in a question" name="chat-input" id="chat-input" rows="3"></textarea>
                </form>
            </div>
        </div>

        <!-- end of chat module -->
    </div>
    <!-- end body wrapper -->

    <!-- footer starts here -->

    <footer>


    </footer>

    <!-- end of footer section -->

</body>

</html>