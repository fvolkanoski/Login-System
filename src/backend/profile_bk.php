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

if (isset($_GET['id'])) 
{
    // Transfer the id so we don't have to call $_GET every time we need it.
    $idReq = $_GET['id'];
    $profileError = '';
    
    // Prepare a select statement.
    $sql = "SELECT id, name, surname, birthday, username, created_at FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql))
    {
        // Bind variables to the prepared statement as parameters.
        mysqli_stmt_bind_param($stmt, "i", $idReq);
        
        // Attempt to execute the prepared statement.
        if(mysqli_stmt_execute($stmt))
        {
            // Store result.
            mysqli_stmt_store_result($stmt);

            // Check if profile requested exists.
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                // Bind result variables.
                mysqli_stmt_bind_result($stmt, $id, $name, $surname, $birthday, $username, $created_at);

                // Fetch the result variables.
                if(mysqli_stmt_fetch($stmt))
                {
                    $profileError = '';
                    $profileId = $id;
                    $profileName = $name;
                    $profileSurname = $surname;
                    
                    // Calculate age.
                    $date = new DateTime($birthday);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    
                    $profileBirthday = $interval->y;
                    $profileUsername = $username;
                    $profileCreated = date('Y', strtotime($created_at));
                }
                else
                {
                    $profileError = 'Error, profile not found.';
                }
            }
            else
            {
                $profileError = 'Error, profile not found.';
            }
        }
        else
        {
            $profileError = 'Error, profile not found.';
        }
    }
    else
    {
        $profileError = 'Error, profile not found.';
    }
} 
else 
{
    echo "404";
}

?>
