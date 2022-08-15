<!--Home page the user will be directed to when logged in-->

<?php
include_once 'includes/functions.php';
include_once 'nav.php';

if(!isset($_SESSION["username"])){
    header("location: login.php?error=notLoggedIn");
    exit();
}
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<p id="hello">Welcome Home!</p>
<p class="name">My name is arsalan </p>