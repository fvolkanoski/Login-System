<?php include_once "backend/profile_bk.php" ?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Shelf Social</title>
		<link rel="shortcut icon" type="image/png" href="img/logo.png"/>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/common.css?v=<?=time();?>">
    <link rel="stylesheet" type="text/css" href="style/profile.css?v=<?=time();?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>

<body>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
        <a class="navbar-brand navbar-custom-brand" href="index.php">Shelf Social</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="groups.php">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo $_SESSION["avatar_path"]; ?>" alt-"profile-pic" class="profilepic-dropdown"> <?php echo $_SESSION["name"]; ?>
        </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["id"]; ?>" style="font-size: 12px;">My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" style="font-size: 12px;">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
  </nav>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- /NAVBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->


<!-- ###TODO: REPLACE ALL THIS WITH PROPER LAYOUT

    <div class="container text-center" style="font-family: 'Roboto', sans-serif; font-size: 10pt;">
      <div class="row">
        <div class="col-md-4">
          <div class="well">
            <a href="profile.php">
              <p>
                <?php echo $profileName.' '.$profileSurname; ?>
              </p>
            </a>
            <img src="<?php echo $userAvatarPath; ?>" height="200" width="200" alt="Avatar">
            <p style="margin-top: 15px;">Age:
              <?php echo $profileBirthday; // TODO: Calculate age. ?>
            </p>
            <p>Joined:
              <?php echo $profileCreated; ?>
            </p>

            <?php

              if($_SESSION["id"] == $idReq) // Check if the user is seeing his own profile.
              {
                  echo '<p><hr></p>';
                  echo '<p><a href="editprofile.php">Edit your profile</a></p>';
              }

            ?>

          </div>
        </div>

        <?php
            // Prepare a select statement.
            $sql = "SELECT id, user_id, post, created_at FROM user_posts WHERE user_id = ?";

            if ($stmt = mysqli_prepare($link, $sql))
            {
                // Bind variables to the prepared statement as parameters.
                mysqli_stmt_bind_param($stmt, "i", $profileId);
                $stmt->execute();
                $stmt->bind_result($id, $user_id, $post, $created_at);

                $postNr = 0;

                // Fetch the result variables.
                while ($stmt->fetch())
                {
                    $postId        = $id;
                    $postUserId    = $user_id;
                    $postText      = $post;
                    $postCreatedAt = $created_at;

                    if($postNr > 2)
                    {
                        echo '<div class="col-md-8 col-md-offset-4">';
                    }
                    else
                    {
                        echo '<div class="col-md-8">';
                    }

                    echo '<div class="well"><table style="width:100%"><tr><td style="width: 30%;" rowspan="2">
                    <img src="';

                    echo $userAvatarPath;

                    echo '" class="img-circle" height="55" width="55" alt="Avatar">';

                    echo '<p style="margin-top: 15px;">';
                    echo $profileName.' '.$profileSurname;
                    echo '</p>';

                    echo '</td><td>';
                    echo $postText;
                    echo'<hr/></td></tr>';

                    echo '<tr>';
                    echo '<td style="width: 70%; text-align: right;"><small><i>';

                    echo $postCreatedAt;

                    echo '</i></small></td></tr></table></div></div>';

                    $postNr += 1;
                }
            }
        ?>

      </div>
    </div> -->
  </body>
</html>
