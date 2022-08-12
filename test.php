<?php
include_once 'includes/dbh.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, World!</title>
</head>
<body>
    hello World, My name is Arsalan.
    <br>

    
    <?php
        /*
        //how to insert data into a table
        $sql = "INSERT INTO users (email,password) VALUES ('$email','$password');";
        $result = mysqli_query($conn, $sql);
        */
        //how to insert data into a table method 2
        $myemail = "new@gmail.com";
        $password = "pswd";
        $sql = "INSERT INTO users (email,password) VALUES (?,?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "sql error";
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss", $myemail, $password);
            mysqli_stmt_execute($stmt);
        }
/*
        //how to get data from table, method 1
        $sql = "SELECT * FROM users ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo $row['email'] . "<br>";
            }
        }
        else{
            echo "failed to get from database";
        }
*/
        //how to get data from table, method 2
        $myemail = "ars@gmail.com";
        $sql = "SELECT * FROM users WHERE email =? ;";
        $stmt = mysqli_stmt_init($conn,);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Sql fail";
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $myemail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($result)){
                echo $row['email'] . "<br>";
            }
        }
            
    ?>
</body>
</html>