<!--This page is where the user will log into the site-->

<?php
include_once 'includes/functions.php';
include_once 'nav.php';
?>

<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<!--Creating registration form-->
<section class="login">
    <h2 id="signuplabel">Login</h2>
        <div class="login-form">
        <form action="includes/login.inc.php" method="POST">
            <input type="text" name ="email" placeholder="Email/Username">
            <input type="password" name ="pswd" placeholder="Password">
            <button type="submit" name ="submit">Log in</button>
        </form>
        </div>
</section>
