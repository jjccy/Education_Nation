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
    <div class="help-module">
        <!-- help module header -->
        <div class="module-header" id="chat-header">
            <p class="heading-4">Ask Us Anything!</p>
            <div class="module-header-icons">
                <a href="#">
                    <div class="icon-more"></div>
                </a>
                <a href="#">
                    <div id="chat-module-caret" class="icon-caret icon-caret-flip"></div>
                </a>
            </div>
        </div>

        <!-- chat content; initially is hidden; when header is clicked on a js script will remove the current class and replace it with a visiblity class -->
        <div class="module-body-hide" id="chat-content">
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

            <!-- user input for question; currently just a front end placeholder -->
            <div class="module-input">
                <form action="" class="chat-input">
                    <textarea placeholder="Type in a question" name="chat-input" id="chat-input" rows="3"></textarea>
                </form>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>

</body>

</html>
