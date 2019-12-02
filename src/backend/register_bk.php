<?php

// =============== INCLUDES ===============
require_once(__DIR__ . '../../cfg/config.php');
// ========================================

// Initialize the session.
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
{
    header("location: welcome.php");
    exit;
}

// Define variables and initialize with empty values.
$name = $surname = $username = $password = $confirm_password = "";
$name_err = $surname_err = $birthday_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted.
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $birthday = trim($_POST["birthday"]);

    // Validate name input.
    if(empty(trim($_POST["name"])))
    {
        $name_err = "Please input your name.";
    }
    else
    {
        if( !(strlen(trim($_POST["name"])) > 2 && strlen(trim($_POST["name"])) < 254) )
        {
            $name_err = "Your name must be between 2 and 254 characters long.";
        }
        else if(!ctype_alnum(trim($_POST["name"])))
        {
            $name_err = "Your name must contain only letters.";
        }

        $name = trim($_POST["name"]);
    }

    // Validate surname input.
    if(empty(trim($_POST["surname"])))
    {
        $surname_err = "Please input your surname.";
    }
    else
    {
        if( !(strlen(trim($_POST["surname"])) > 2 && strlen(trim($_POST["surname"])) < 254) )
        {
            $surname_err = "Your surname must be between 2 and 254 characters long.";
        }
        else if(!ctype_alnum(trim($_POST["surname"])))
        {
            $surname_err = "Your surname must contain only letters.";
        }

        $surname = trim($_POST["surname"]);
    }

    // Validate birthday input.
    if(empty(trim($_POST["birthday"])))
    {
        $birthday_err = "Please input your birthday.";
    }

    // Validate username.
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter a username.";
    }
    else
    {
        // Prepare a select statement.
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters.
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                // Store the result.
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken.";
                }
                else
                {
                    $username = trim($_POST["username"]);
                }
            }
            else
            {
                // Error while executing statement.
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement.
        mysqli_stmt_close($stmt);
    }

    // Validate password.
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";
    }
    elseif(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    }
    else
    {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password.
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);

        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }

    $noError = empty($name_err) && empty($surname_err) && empty($birthday_err) &&
               empty($username_err) && empty($password_err) && empty($confirm_password_err);

    // Check input errors before inserting in database.
    if($noError)
    {
        // Prepare an insert statement.
        $sql = "INSERT INTO users (name, surname, birthday, username, password) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_surname,
                                                   $param_birthday, $param_username, $param_password);

            // Set parameters.
            $param_name = $name;
            $param_surname = $surname;
            $param_birthday = $birthday;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash.

            // Attempt to execute the prepared statement.
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to index page.
                header("location: index.php");
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement.
        mysqli_stmt_close($stmt);
    }

    // Close connection.
    mysqli_close($link);
}
?>
