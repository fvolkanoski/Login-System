<?php
// Initialize the session.
session_start();
 
// Check if the user is logged in, if not then redirect him to index page.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body
        { 
            font: 14px sans-serif; 
        }
    </style>
</head>
<body>
    <a href="logout.php">Logout</a>
</body>
</html>


