<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Account Settings</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">

  </head>

  <body>
    <?php 
        $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");
        $devider_file = fopen("devider.txt", "r") or die("Unable to open file!");
        $d = strtok(fgets($devider_file), "\n");

        // retrieve approved logged in user first name
        $current_file = fopen("currentUser.txt", "r") or die("Unable to open file!");
        // $currentUser = "First1";
        $currentUser = strtok(fgets($current_file), "\n");
        echo $currentUser . "<br>";

        $user_data = array("");

        $userFound = "false";

        while (!feof($handle)) {
            // gets the current line of the .txt file
            $currentLine = fgets($handle);

            // removing the line break that fgets() creates
            $user_data = explode($d, strval($currentLine));

            // checking if first name is the user we're looking for
            if ($user_data[2] == $currentUser) {
                $userFound = "true";
                break;
            }

            // checking if user has been found; if true it will leave the while loop
            if ($userFound == "true") {
                break;
            }
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
            echo "User has not been found" . "<br>";
        }

        // closing .txt files
        fclose($handle);
        fclose($devider_file);
    ?>

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

        <div class="form-submit">
          <input type="submit" name="edit-account-submit" id="edit-account-submit" value="Update" class="button-default">
        </div>
      </div>
    </form>

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
