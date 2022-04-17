<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form </title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="login.php">
      <?php include('error.php') ?>
        <div class="txt_field">
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="txt_field">
          <input type="password" placeholder="Password" name="password" required>
        </div>
        <div class="input-group">
  		    <button type="submit" class="btn" name="login_user">Login</button>
  	    </div>
        <div class="signup_link">
          Not a member? <a href="Register.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
