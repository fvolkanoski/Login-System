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

$postTextError = "";
$postTextSuccess = "";

// Processing form data when form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST")
{
        // Check if username is empty.
        if(empty(trim($_POST["post_text"])))
        {
            $postTextError = 'You have not typed any text to post.';
        }
        // If it is not empty, trim the input.
        else
        {
            $postText = trim($_POST["post_text"]);
        }

        if(empty($postTextError))
        {
            $postSql = "INSERT INTO user_posts (user_id, post)
                        VALUES (?, ?)";

            if($postStmt = mysqli_prepare($link, $postSql))
            {
                // Bind variables to the prepared statement as parameters.
                mysqli_stmt_bind_param($postStmt, "is", $param_id, $param_post);

                $param_id = $_SESSION["id"];
                $param_post = $postText;

                // Attempt to execute the prepared statement.
                if(mysqli_stmt_execute($postStmt))
                {
                    $postTextSuccess = 'Your post has been submitted.';
                }

            }
        }
}
?>
