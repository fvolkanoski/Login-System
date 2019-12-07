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

$target_dir = "avatars/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        echo $target_file;

        $newAvatarSql = "UPDATE users SET avatar_path = ? WHERE id = ?";

        if($avatarStmt = mysqli_prepare($link, $newAvatarSql))
        {
            // Bind variables to the prepared statement as parameters.
            mysqli_stmt_bind_param($avatarStmt, "si", $target_file, $_SESSION["id"]);

            // Attempt to execute the prepared statement.
            mysqli_stmt_execute($avatarStmt);

            // Close statement.
            mysqli_stmt_close($avatarStmt);

            $_SESSION["avatar_path"] = $target_file;
          }

        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("location: editprofile.php");
        exit;
    }
    else
    {
       // echo "Sorry, there was an error uploading your file.";
    }
}
?>
