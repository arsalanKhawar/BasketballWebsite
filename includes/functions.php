<!--Useful functions-->

<?php
include_once 'includes/dbh.php';



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
//checks if login fields are complete.
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

//checks if the teamname field is empty when the user adds a new team
function emptyteamname($teamname){
    $result = true;
    if(empty($teamname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//logs in user if login is valid, otherwise tells user about invalid login info
function loginUser($conn, $username, $pswd){
    $uidExists = usernameExists($conn, $username, $username);
    if($uidExists === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    $pswdHash = $uidExists["password"];
    $pswdCheck = password_verify($pswd,$pswdHash);

    if($pswdCheck === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    else if($pswdCheck === true){
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../home.php");
        exit();
    }

}

//checks if a user already has a team with a certain name
function teamnameExists($conn, $teamname){
    session_start();
    $userid = $_SESSION["id"];
    $sql = "SELECT * FROM teams WHERE teamName = ? AND uid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../addteam.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$teamname,$userid);
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

//adds team to database
function addteam($conn, $teamname){
    $userid = $_SESSION["id"];
    
    
    $sql = "INSERT INTO teams (teamName,uid) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../addteam.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss",$teamname,$userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../addteam.php?error=none");
}

?>