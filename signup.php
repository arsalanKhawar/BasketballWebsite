<!--This page will create a registration page and form for the user-->

<?php
include_once 'nav.php';
include_once 'includes/functions.php';
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
        <?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "Fill all fields";
    }
    if($_GET["error"] == "invalidusername"){
        echo "invalid username";
    }
    if($_GET["error"] == "invalidemail"){
        echo "invalid email";
    }
    if($_GET["error"] == "unmatchingpswd"){
        echo "Passwords do not match!";
    }
    if($_GET["error"] == "usernameExists"){
        echo "This username is already taken!";
    }
    if($_GET["error"] == "stmtfailed"){
        echo "Fill all fields";
    }
    if($_GET["error"] == "none"){
        echo "Success!";
    }
}
?>
</section>


