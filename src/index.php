<?php include_once "backend/index_bk.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style/index.css?v=<?=time();?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="login_wrapper">
    <center>
      <a href="index.php"><img alt="Logo" src="img/logo.png" height="50%" width="50%"></a>
      <hr />
    </center>
    <form action="index.php" method="post">
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label class="white-color">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block login_error"><?php echo $username_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label class="white-color">Password</label>
        <input type="password" name="password" class="form-control">
        <span class="help-block login_error"><?php echo $password_err; ?></span>
      </div>
      <center>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <hr />
        <p class="white-color">Don't have an account? <a href="register.php">Sign up now</a>.</p>
      </center>
    </form>
  </div>
</body>

</html>
