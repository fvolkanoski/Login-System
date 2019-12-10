<?php include_once "backend/groups_bk.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login System
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/groups.css">
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
              <a href="groups.php">Groups
              </a>
            </li>
            <li>
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
  </body>
</html>
