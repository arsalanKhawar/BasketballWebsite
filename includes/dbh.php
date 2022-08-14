<!--Initialized database connection. Will be referenced on any page that needs to access the database-->

<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "basketballwebsite";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
?>