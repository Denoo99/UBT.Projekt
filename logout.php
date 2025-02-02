<?php

@include 'config.php';

session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Redirect to the index page
header('Location: index.html');
exit(); // Ensure no further code is executed
?>