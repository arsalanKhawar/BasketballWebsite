<?php
include_once 'includes/functions.php';
include_once 'nav.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<nav>
    <ul>
        <?php if(!is_logged_in()) : ?>
            <li><a href = "<?php echo 'login.php' ?>">Login</a></li>
            <li><a href = "<?php echo 'register.php' ?>">Register</a></li>
            <li><a href = "<?php echo 'about.php' ?>">About</a></li>
            <?php endif;?>
    </ul>
</nav>