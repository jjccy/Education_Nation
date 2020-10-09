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
        $currentUser = "First1";
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

        echo $firstName . "<br>";
        echo $lastName . "<br>";
        echo $email . "<br>";
        echo $password . "<br>";

        // letting system know no user has been found
        if ($userFound != "true") {
            echo "User has not been found" . "<br>";
        }

        // closing .txt files
        fclose($handle);
        fclose($devider_file);
    ?>
    
  </body>
</html>
