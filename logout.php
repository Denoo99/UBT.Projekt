<?php
@include 'config.php';

session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_unset();
session_destroy();

// Start a new session with a fresh ID
session_start();
session_regenerate_id(true);

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // HTTP 1.1.
header("Cache-Control: post-check=0, pre-check=0", false); // HTTP 1.0.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Redirect to login page
header("Location: login_form.php");
exit();
?>
