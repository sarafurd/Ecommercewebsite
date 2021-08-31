<?php
// Initialize the session
session_start();

// Check if the user is logged in
// If they're not logged in then redirect them to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>

   <head>
      <title>Welcome </title>
   </head>
   <body>
    <?php include "oasisgarden.php"; ?>
   </body>

</html>
