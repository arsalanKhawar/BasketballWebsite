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
function invalidUsername($username){
    $result = true;
    if(!preg_match("/^[a-z0-9_-]{3,30}$/i", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//will check username conditions
function invalidEmail($email){
    $result = true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//checks if password and confirm password match
function pswdMatch($pswd,$confirmpswd){
    $result = true;
    if($pswd !== $confirmpswd){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//checks if the username is already in database
function usernameExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//Adds user information into users database
function createUser($conn,$name,$email,$username,$pswd){
    $sql = "INSERT INTO users (name,email,username,password) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashPwd = password_hash($pswd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$username, $hashPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
}

function emptyInputLogin($username, $pswd){
    $result = true;
    if(empty($username) || empty($pswd) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

?>