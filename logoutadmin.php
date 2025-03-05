<?php
session_start(); // Start the session

// Unset specific session variable 'umail'
unset($_SESSION['umail']);  // This will remove the 'umail' session variable

// If you want to clear all session variables (optional), you can use session_unset():
// session_unset();  // This clears all session variables

// Destroy the session (optional, if you want to end the session completely)
session_destroy();

// Redirect to login page or another page after logout
header("Location:index.html");
exit(); // Ensure no further code is executed after the redirect
?>