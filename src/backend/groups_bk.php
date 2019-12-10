<?php

// =============== INCLUDES ===============
require_once(__DIR__ . '../../cfg/config.php');
// ========================================

// Initialize the session.
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page.
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"])
{
    header("location: index.php");
    exit;
}

?>
