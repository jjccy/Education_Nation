<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<div class="responsive-nav-bar">
    <div class="nav-item">
        <img id="mobile-hamburger" src="img/menu.svg" alt="Hamburger Icon">
    </div>

    <div class="nav-item">
        <a href="index.php">
            <img src="img/Logo.svg" alt="Education Nation Logo">
        </a>
    </div>

    <div class="nav-item">
        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && (!isset($_SESSION['isTutor']) || !$_SESSION['isTutor'])) {
                echo '<a href="cart.php">';
                    echo '<img id="mobile-cart" src="img/Cart.svg" alt="Cart Icon">';
                echo '</a>';
            }
        ?>
    </div>
</div>

<div id="menu-underlay" class="responsive-menu-underlay"></div>

<div id="responsive-menu" class="responsive-menu hide">
    <div class="responsive-menu-item">
        <img id="mobile-menu-close" src="img/close-black.svg" alt="Close Button">
    </div>

    <div class="responsive-menu-item">
        <a href="index.php" class="heading-2">Home</a>
    </div>

    <div class="responsive-menu-item">
        <a href="tutors-listing.php" class="heading-2">Tutors</a>
    </div>

    <div class=" responsive-menu-item ">
        <a href="about.php " class="heading-2">About</a>
    </div>

    <div class="responsive-menu-item">
        <a href="contact.php" class="heading-2">Contact</a>
    </div>

    <div class="responsive-menu-item">
        <div class="menu-spacer"></div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <div class="responsive-menu-item">
            <a href="account-settings.php" class="heading-3">Account Settings</a>
        </div>

        <?php
        if ($_SESSION['isTutor']) {
            echo '<div class="responsive-menu-item">';
            echo '<a href="tutor_courses-create.php" class="heading-3">Create new course</a>';
            echo '</div>';
        }
        ?>

        <div class="responsive-menu-item">
            <a href="logOut.php" class="heading-3">Logout</a>
        </div>
    <?php
    }   else { ?>
        <div class="responsive-menu-item">
            <a href="sign-up.php" class="heading-3">Sign up</a>
        </div>

        <div class="responsive-menu-item">
            <a href="login.php" class="heading-3">Login</a>
        </div>
    <?php
    }
    ?>
</div>

<script src=" js/responsive-nav.js "></script>