<?php
session_start();

// Destroy session data
session_destroy();

// Redirect user to login page
header("Location: login.php");
exit;
?>
