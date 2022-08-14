<!--Useful functions-->

<?php
include_once 'includes/dbh.php';

function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        echo "You must be logged in to view this page";
        die(header("Location: $destination"));
    }
    return $isLoggedIn; //se($_SESSION, "user", false, false);
}

function emptyInputSignup(){

}

function invalidEmail(){

}

function invalidUsername(){

}

function pswdMatch(){

}

function usernameExists(){

}

function createUser(){
    
}

?>