<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Construction</title>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/homePage.css">
</head>
<body>
    <div class="background"></div>

    <section class="under-construction">
        <div class="construction-content-container">
            <p class="heading-1">
                Well this is awkward...
            </p>

            <p class="heading-2">
                This page is not ready for you yet.
            </p>

            <button id="back-home-btn" class="button-default">Return to homepage</button>
        </div>
    </section>

    <script>
        var btn = document.getElementById("back-home-btn");

        btn.addEventListener("click", returnHome);

        function returnHome() {
            window.location.href='index.php';
        }
    </script>

    <!-- prevents the remainder of the page to be loaded -->
    <?php exit(); ?>
</body>
</html>