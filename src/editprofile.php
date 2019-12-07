<?php include_once "backend/editprofile_bk.php" ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login System
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/editprofile.css">
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
            <li class="active">
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
        <div class="col-md-6">
          <div class="well">
            <center>
                <div class="square">
                <img src="<?php echo $_SESSION["avatar_path"]; ?>" alt="Avatar">
              </div>
            </center>

              <center><form action="uploadavatar.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form></center>
          </div>
        </div>
        <!-- PROFILE SIDEBAR LEFT#END -->

      </div>
    </div>
  </body>
</html>
