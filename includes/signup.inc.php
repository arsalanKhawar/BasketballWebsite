<!--This page will add the new user information into the database-->
<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pswd = $_POST["pswd"];
    $confirmpswd = $_POST["confirmpswd"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyInputSignup($name, $email, $username, $pswd, $confirmpswd) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUsername($username) !== false){
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pswdMatch($pswd,$confirmpswd) !== false){
        header("location: ../signup.php?error=unmatchingpswd");
        exit();
    }
    if(usernameExists($conn, $username) !== false){
        header("location: ../signup.php?error=usernameExists");
        exit();
    }

    createUser($conn,$name,$email,$username,$pswd);


}
else{
    
    header("location: ../signup.php");
    exit();
}
?>