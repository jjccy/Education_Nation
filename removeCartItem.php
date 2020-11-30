<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['cartid'])) {
        $cart_id = $_GET['cartid'];
    }

    $connection = mysqli_connect("localhost", 'login', '', "terence_liu");
    if(mysqli_connect_errno()) {
    // if fail, skip all php and print errors

    die("Database connet failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno(). ")"
    );
    }

    $query = 'DELETE from cartadd WHERE cartadd.cart_id =' . $cart_id;
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Remove cart item failed" . mysqli_error($connection));
    }

    mysqli_free_result($result);
    mysqli_close($connection);
?>

<script>
    window.location.href = 'cart.php';
</script>