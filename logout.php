<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION["loggedin"] = array();

 
// Redirect to login page
header("location: index.php");
exit;
?>