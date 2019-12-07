<?php include_once "backend/welcome_bk.php" ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Login System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>

  <body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px; border: none; font-family: 'Roboto', sans-serif; font-size: 10pt;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;">Login System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="profile.php?id=<?php echo $_SESSION["id"]; ?>">My Profile</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR#END -->

    <!-- PROFILE SIDEBAR LEFT -->
    <div class="container text-center" style="font-family: 'Roboto', sans-serif; font-size: 10pt;">
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <a href="profile.php">
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
              <form action="welcome.php" method="post">
                <form>
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Post something..." rows="5" name="post_text"></textarea>
                    <input type="submit" class="btn btn-primary" style="float: right; margin-top: 15px;" value="Post"></button>
                  </div>
                </form>
                  
                  
            </div>
          </div>
          <!-- FULL WIDTH CENTER CONTAINER#END -->
          <hr>
        <?php
            // Prepare a select statement.
            $sql = "SELECT id, user_id, post, created_at FROM user_posts";
          
            if ($stmt = mysqli_prepare($link, $sql)) 
            {
                $stmt->execute();
                $stmt->bind_result($id, $user_id, $post, $created_at);
                
                // Fetch the result variables.
                while ($stmt->fetch()) 
                {
                    $postId        = $id;
                    $postUserId    = $user_id;
                    $postText      = $post;
                    $postCreatedAt = $created_at;

                    echo '<div class="row"><div class="col-sm-12">';
                    
                    echo '<div class="well"><table style="width:100%"><tr><td style="width: 30%;" rowspan="2">
                    <a href="profile.php?id=';
                    echo $postUserId;
                    echo '">';
                    echo '<img src="img/default_user.png" class="img-circle" height="55" width="55" alt="Avatar"></a>';

                    echo '</td style="width: 70%"><td>';
                    echo $postText;
                    echo'<hr/></td></tr>';
                    
                    echo '<tr>';
                    echo '<td style="width: 70%; text-align: right;"><small><i>';
                
                    echo $postCreatedAt;
                    
                    echo '</i></small></td></tr></table></div></div></div>';
                }
            }   
        ?>
        </div>

        <div class="col-sm-2 well">
          right sidebar
        </div>
      </div>
    </div>
  </body>

  </html>
