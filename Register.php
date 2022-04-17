<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
   </head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form method="post" action="Register.php">
      <?php include('error.php');?>
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="Username" value="<?php echo $username;?>" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" value="<?php echo $email;?>" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter password" name="password_1" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name="password_2" required>
      </div>
      <div class="input-box ">
        <button type="Submit" class="btn" name="reg_user" >Register </button>
      </div>
      <div class="text">
        <h3>Already have an account? <a href="Login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
