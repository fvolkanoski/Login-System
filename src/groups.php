<?php include_once "backend/groups_bk.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login System
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/groups.css?v=<?=time();?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="groups.php">Groups <span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION[" id "]; ?>" style="font-size: 12px;">My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" style="font-size: 12px;">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- /NAVBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->

</body>
</html>