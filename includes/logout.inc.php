<!--Logs out the user when they click logout and redirects them to login-->

<?php
session_start();
session_unset();
session_destroy();
header("location: ../login.php");
exit();
?>