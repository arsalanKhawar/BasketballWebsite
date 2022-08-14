<!--Useful functions-->

<?php
include_once 'includes/dbh.php';

//checks if user is logged in
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        echo "You must be logged in to view this page";
        die(header("Location: $destination"));
    }
    return $isLoggedIn; //se($_SESSION, "user", false, false);
}

//will check if signup form has empty fields
function emptyInputSignup($name, $email, $username, $pswd, $confirmpswd){
    $result = true;
    if(empty($name) || empty($email) || empty($username) || empty($pswd) || empty($confirmpswd) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

//will check email conditions
function invalidEmail($username){

}

//will check username conditions
function invalidUsername($email){

}

//checks if password and confirm password match
function pswdMatch($pswd,$confirmpswd){

}

//checks if the username is already in database
function usernameExists($conn, $username){

}


function createUser($conn,$name,$email,$username,$pswd){

}

?>