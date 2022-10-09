<!--Recieves user data from login.php and performs various checks on the data via functions.php, and then logs in the user via functions.php-->
<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $pswd = $_POST["pswd"];
    require_once "dbh.php";
    require_once "functions.php";

    if(emptyInputLogin($username, $pswd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn,$username,$pswd);
}


else{
    header("location: ../login.php");
    exit();
}
