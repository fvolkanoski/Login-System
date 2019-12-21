<?php include_once "backend/welcome_bk.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login System
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/welcome.css?v=<?=time();?>">
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
                        <a class="dropdown-item" href="#" style="font-size: 12px;">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- /NAVBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->

		<div style="margin-top: 50px;">
			<div class="container">
  			<div class="row">
		
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- LEFT SIDEBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
					<div class="col-sm-3">
							<div class="card" style="width: 14em;">
									<img src="<?php echo $_SESSION["avatar_path"]; ?>" class="card-img-top" alt="avatar" width="50%" height="50%">
									<div class="card-body">
											<h5 class="card-title"><center><?php echo $_SESSION["name"].' '.$_SESSION["surname"]; ?></center></h5>
											<p class="card-text">
											</p>
									</div>
							</div>
					</div>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- /LEFT SIDEBAR -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
					
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- CENTER CONTENT -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<div class="col-sm-6">
	<?php
     	// Prepare a select statement.
     	$sql = "SELECT id, user_id, post, created_at FROM user_posts ORDER BY created_at DESC";
     	if ($stmt = mysqli_prepare($link, $sql)) {
     	    $stmt->execute();
     	    //$stmt->bind_result($id, $user_id, $post, $created_at);
     	    $result = $stmt->get_result();
     	    // Fetch the result variables.
     	    while ($row = $result->fetch_assoc()) {
     	        //$postId        = $id;
     	        //$postUserId    = $user_id;
     	        //$postText      = $post;
     	        //$postCreatedAt = $created_at;
     	        $postId = $row["id"];
     	        $postUserId = $row["user_id"];
     	        $postText = $row["post"];
     	        $postCreatedAt = $row["created_at"];
     	        $userSql = "SELECT name, surname, avatar_path FROM users WHERE id = ?";
     	        if ($userStmt = mysqli_prepare($link, $userSql)) {
     	            mysqli_stmt_bind_param($userStmt, "i", $postUserId);
     	            $userStmt->execute();
     	            $userResult = $userStmt->get_result();
     	            while ($userRow = $userResult->fetch_assoc()) {
									$postUserName = $userRow["name"];
									$postUserSurname = $userRow["surname"];
     	                $userAvatarPath = $userRow["avatar_path"];
     	            }
     	        } ?>
	
	
		<div class="container post-main-container">
				<div class="row post-first-row">
						<div class="col-sm-2">
								<a href="profile.php?id=<?php echo $postUserId; ?>"><img src="<?php echo $userAvatarPath ?>" alt="poster-avatar" class="poster-avatar"></a>
						</div>
						<div class="col-sm-7 post-poster">
								<?php echo $postUserName . ' ' . $postUserSurname; ?>
										<br>
										<span class="post-posted-at"><?php echo $postCreatedAt ?></span>
						</div>
						<div class="col-sm-3">
								<span style="float: right;">...</span>
						</div>
				</div>
				<div class="row post-second-row">
						<?php echo $postText; ?>
				</div>
		</div>
	
	
	<?php
					}
			}
	?>
	
	
	
	

</div>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- /CENTER CONTENT -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
					

    <div class="col-sm-3">
      One of three columns
    </div>

					
			  </div>
			</div>
		</div>
  </body>
</html>
