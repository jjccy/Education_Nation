<div class="user-overlay">
    <img class="user-pfp" src="
    <?php
        // get database
        $connection = mysqli_connect("localhost", "view", "", "terence_liu");

        if(mysqli_connect_errno()) {
        // if fail, skip all php and print errors

        die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno(). ")"
        );
        }

        // change above step to session
        $currentUser = $_SESSION['m_id'];

        $query = "SELECT profile_address FROM member WHERE member.m_id = '$currentUser'";

        // get result from database;
        $result = mysqli_query($connection, $query);

        if (!$result) {
        die('database query failed');
        }

        while ($row = $result -> fetch_assoc()) {
        echo $row['profile_address'];
        }

        mysqli_free_result($result);
    ?>
    " alt="Account User Profile Picture">
    <div class="user-info-container">
        <div class="space-filler"></div>
        <div class="user-info-wrapper">
            <div class="user-info">
                <p class="heading-1 tutor-name">
                    <?php
                    // get database
                    $connection = mysqli_connect("localhost", "view", "", "terence_liu");

                    if(mysqli_connect_errno()) {
                        // if fail, skip all php and print errors

                        die("Database connet failed: " .
                        mysqli_connect_error() .
                        " (" . mysqli_connect_errno(). ")"
                        );
                    }

                    // stating the deliminator
                    $d ='#KR#%5>DSG<)(E667)F?';

                    // change above step to session
                    $currentUser = $_SESSION['m_id'];

                    $query = "SELECT * FROM member WHERE member.m_id = '$currentUser'";

                    // get result from database;
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die('database query failed');
                    }

                    while ($row = $result -> fetch_assoc()) {
                        echo $row['fname'] . " " . $row['lname'] . "<br>";
                    }

                    mysqli_free_result($result);
                    // mysqli_close($connection);

                    ?>
                </p>
                <!-- <p class="tutor-spec">Math Tutor (K-12)</p> -->
            </div>

            <?php if (isset($_SESSION['isTutor']) && $_SESSION['isTutor']) { ?>
                <div class="user-info">
                    <p class="heading-3 tutor-balance">Balance </p>
                    <p class="heading-3 tutor-balance-amount">
                        <?php
                        $query = "SELECT * FROM tutor WHERE tutor.tutor_id = '$currentUser'";

                        // get result from database;
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die('database query failed');
                        }

                        while ($row = $result -> fetch_assoc()) {
                            echo "$" . $row['balance'];
                        }

                        mysqli_free_result($result);
                        ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
