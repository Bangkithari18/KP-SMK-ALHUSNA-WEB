<?php
// Start the session (if not already started)
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: ../KP-SMK-ALHUSNA-WEB/views/login.php");
exit;
