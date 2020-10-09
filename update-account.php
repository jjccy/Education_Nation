<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Updating Account</title>
  </head>
  <body>
    <?php
        //get the userinfo text file
        $handle = fopen("userInfo.txt", "r") or die("Unable to open file!");
        // get the devider word between info
        $deviderFile = fopen("devider.txt", "r") or die("Unable to open file!");
        $devider = fgets($deviderFile);
        $devider = strtok($devider, "\n"); // remove new line from fgets
        fclose($deviderFile);
        $name = "";
        $email = "";
        $password= "";

        // retrieve approved logged in user first name
        $current_file = fopen("currentUser.txt", "r") or die("Unable to open file!");
        // $currentUser = "First1";
        $currentUser = strtok(fgets($current_file), "\n");

        $userFound = "false";

        while (!feof($handle)) {
            // gets the current line of the .txt file
            $currentLine = fgets($handle);

            // removing the line break that fgets() creates
            $user_data = explode($devider, strval($currentLine));

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

        // retrieving updated user info and storing them as new variables;
        if($_POST['fname-edit'] != NULL && $firstName != $_POST['fname-edit']){
            $newFirstName = $_POST['fname-edit'];
        }
        else {
            $newFirstName = $firstName;
        }

        if($_POST['lname-edit'] != NULL && $lastName != $_POST['lname-edit']){
            $newLastName = $_POST['lname-edit'];
        }
        else {
            $newLastName = $lastName;
        }

        if($_POST['email-edit'] != NULL && $email != $_POST['email-edit']){
            $newEmail = $_POST['email-edit'];
        }

        else {
            $newEmail = $email;
        }

        if($_POST['password-edit-input'] != NULL && $password != $_POST['password-edit-input']){
            $newPassword = $_POST['password-edit-input'];
        }

        else {
            $newPassword = $password;
        }

        // echo $newFirstName . "<br>";
        // echo $newLastName . "<br>";
        // echo $newEmail . "<br>";
        // echo $newPassword . "<br>";

        $updatedUserInfo = $newEmail . $devider . $newPassword . $devider . $newFirstName . $devider . $newLastName;

        fclose($handle);

        echo $updatedUserInfo;

        $update = fopen("userInfo.txt", "r+") or die("Unable to open file!");
        $userInfo = "userInfo.txt";
        $userFound = "false";

        while (!feof($update)) {
            // gets the current line of the .txt file
            $currentLine = fgets($update);

            // removing the line break that fgets() creates
            $user_data = explode($devider, strval($currentLine));

            // checking if first name is the user we're looking for
            if ($user_data[2] == $currentUser) {
                $updatedLine = file_get_contents($userInfo);
                echo $updatedLine . "<br>";
                $updatedLine = str_replace($currentLine, $updatedUserInfo, $updatedLine);
                echo $updatedLine . "<br>";
                file_put_contents($userInfo, $updatedLine);
                $userFound = "true";
                break;
            }

            // checking if user has been found; if true it will leave the while loop
            if ($userFound == "true") {
                break;
            }
        }

        fclose($update);
      ?>

  </body>
</html>