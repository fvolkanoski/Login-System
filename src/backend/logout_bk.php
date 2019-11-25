<?php

// =============== INCLUDES ===============
require_once(__DIR__ . '../../cfg/config.php');
// ========================================

// Initialize the session.
session_start();

// Unset all of the session variables.
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to index page.
header("location: index.php");
exit;
?>
