<!--This page will create a registration page and form for the user-->

<?php
include_once 'nav.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<!--Creating registration form-->
<section class="signup">
    <h2 id="signuplabel">Sign up</h2>
        <div class="signup-form">
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name ="name" placeholder="Name">
            <input type="text" name ="email" placeholder="Email">
            <input type="text" name ="username" placeholder="Username">
            <input type="password" name ="pswd" placeholder="Password">
            <input type="password" name ="confirmpswd" placeholder="Confirm Password">
            <button type="submit" name ="submit">Signup</button>
        </form>
        </div>
</section>
