<?php
// Start the session
session_start();

// Destroy the session
session_unset();  // Removes all session variables
session_destroy(); // Destroys the session

// Redirect to the login page
header("Location: login.php"); // Change 'login.php' to your actual login page
exit();
?>
