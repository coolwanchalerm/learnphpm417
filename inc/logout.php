<?php
session_start();

// Destroy the session
session_destroy();

// Unset all of the session variables
$_SESSION = array();

// Redirect the user to the login page
header("Location: ../index.php");
exit;
?>
