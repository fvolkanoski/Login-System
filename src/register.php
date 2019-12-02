<?php include_once "backend/register_bk.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/register.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="register_wrapper">
    <center>
      <p class="h4">Register</p>
      <hr />
    </center>
    <form action="register.php" method="post">
      <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        <span class="help-block register_error"><?php echo $name_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
        <label>Surname</label>
        <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
        <span class="help-block register_error"><?php echo $surname_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($birthday_err)) ? 'has-error' : ''; ?>">
        <label>Birthday</label>
        <input type="date" name="birthday" class="form-control" value="<?php echo $birthday; ?>">
        <span class="help-block register_error"><?php echo $birthday_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block register_error"><?php echo $username_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
        <span class="help-block register_error"><?php echo $password_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
        <span class="help-block register_error"><?php echo $confirm_password_err; ?></span>
      </div>
      <center>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="index.php">Login here</a>.</p>
      </center>
    </form>
  </div>
</body>
</html>
