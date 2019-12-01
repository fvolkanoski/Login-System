<?php include_once "backend/welcome_bk.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px; border: none;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Login System</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR#END -->

    <!-- PROFILE SIDEBAR LEFT -->
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-3">
                <div class="well">
                    <a href="#">
                        <p>
                            <?php echo $_SESSION["name"]." ".$_SESSION["surname"]; ?>
                        </p>
                    </a>
                    <img src="img/default_user.png" class="img-circle" height="55" width="55" alt="Avatar">
                </div>
            </div>
            <!-- PROFILE SIDEBAR LEFT#END -->

            <div class="col-sm-7">

                <!-- FULL WIDTH CENTER CONTAINER -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default text-left">
                            <div class="panel-body">
                                <p>
                                    <center>full width container</center>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FULL WIDTH CENTER CONTAINER#END -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <table style="width:100%">
                                <tr>
                                    <td style="width: 30%;">
                                        <img src="img/default_user.png" class="img-circle" height="55" width="55" alt="Avatar">
                                    </td>
                                    <td>This is a post container.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 well">
                right sidebar
            </div>
        </div>
    </div>
</body>

</html>