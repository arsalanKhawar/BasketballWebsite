<!--This page is for the navigation bar on top of every page in the website-->

<?php
session_start();
include_once 'includes/functions.php';
include_once 'nav.php';
?>
<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<!--Nav bar for users who are NOT logged in-->
<nav>
    <ul>
            
            <?php
            if(isset($_SESSION["username"])){
                echo "<li><a href =  'home.php' >Home</a></li>";
                echo "<li><a href =  'about.php' >About</a></li>";
                echo "<li><a href = 'includes/logout.inc.php' >Logout</a></li>";
                echo "<li><a href = 'addteam.php' >Add Team</a></li>";

            }
            else{
            echo "<li><a href = 'login.php'>Login</a></li>";
            echo " <li><a href = 'signup.php' >Sign up</a></li>";
            echo "<li><a href = 'about.php' >About</a></li>";
            }
            ?>
        
        
    </ul>
</nav>

<!--Nav bar for logged in users-->
