<!--This page will allow the user to add a team. -->
<?php
include_once 'includes/functions.php';
include_once 'nav.php';
?>

<link rel="stylesheet" href="<?php echo 'styles.css'; ?>">

<section class=addteam>
    <h2 id=addteamheader>Add a team</h2>
    <div class="addteamform">
        <form action="includes/addteam.inc.php" method="POST">
            <input type="text" name="teamname" placeholder="Team Name"> 
            <button type="submit" name="submit" >Add Team</button>
        </form>
    </div>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyteamname"){
            echo "Enter a team name.";
        }
        if($_GET["error"] == "teamnameExists"){
            echo "This team already exists!";
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