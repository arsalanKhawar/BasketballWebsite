<!--Recieves user data from addteam.php and performs various checks on the data via functions.php, and then adds the team via functions.php-->

<?php
if(isset($_POST["submit"])){
    $teamname = $_POST["teamname"];
    require_once "dbh.php";
    require_once "functions.php";

    if(emptyteamname($teamname) !== false){
        header("location: ../addteam.php?error=emptyteamname");
        exit();
    }
    if(teamnameExists($conn, $teamname) !== false){
        header("location: ../addteam.php?error=teamnameExists");
        exit();
    }
    addteam($conn, $teamname);
}
?>