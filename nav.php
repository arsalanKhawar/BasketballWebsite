<!--This page is for the navigation bar on top of every page in the website-->

<?php
include_once 'includes/functions.php';
include_once 'nav.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<!--Nav bar for users who are NOT logged in-->
<nav>
    <ul>
        <?php if(!is_logged_in()) : ?>
            <li><a href = "<?php echo 'login.php' ?>">Login</a></li>
            <li><a href = "<?php echo 'signup.php' ?>">Sign up</a></li>
            <li><a href = "<?php echo 'about.php' ?>">About</a></li>
            <?php endif;?>
    </ul>
</nav>

<!--Nav bar for logged in users-->
