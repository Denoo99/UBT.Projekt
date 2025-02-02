<?php

@include 'config.php';

session_start();

// Unset and destroy the current session
$_SESSION = array();
session_unset();
session_destroy();

// Start a new session with a fresh ID to prevent session fixation
session_start();
session_regenerate_id(true);

// Prevent caching (so users can't access the previous session by pressing "Back")
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); // HTTP 1.1.
header("Cache-Control: post-check=0, pre-check=0", false); // HTTP 1.0.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Redirect to login page
header("Location: login_form.php");
exit();

?>
