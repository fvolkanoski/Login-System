<?php include_once "backend/profile_bk.php" ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login System
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px; border: none; font-family: 'Roboto', sans-serif; font-size: 10pt;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
          <a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;">Login System
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php">Home
              </a>
            </li>
            <li>
              <a href="groups.php">Groups
              </a>
            </li>
            <li <?php if($idReq == $_SESSION["id"]) echo 'class="active"'; ?> >
              <a href="profile.php?id=<?php echo $_SESSION["id"]; ?>">My Profile
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="logout.php">Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR#END -->

    <!-- PROFILE SIDEBAR LEFT -->
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
        <!-- PROFILE SIDEBAR LEFT#END -->

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
    </div>
  </body>
</html>
