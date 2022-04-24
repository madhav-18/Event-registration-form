<?php session_start();

  // initializing variables
  $username = "";
  $email    = "";
  $code= array();
  $errors = array(); 

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'v-cerf');

  // REGISTER USER  
 if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $Username = mysqli_real_escape_string($db, $_POST['Username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $register_user_check_query = "SELECT * FROM register_user WHERE username='$Username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $register_user_check_query);
  $register_user = mysqli_fetch_assoc($result);
  
  if ($register_user) { // if user exists
    if ($register_user['username'] === $Username) {
      array_push($errors, "Username already exists");
    }

    if ($register_user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    $activationcode = rand(99999, 11111);
  	$query = "INSERT INTO register_user (username, email, password) 
  			  VALUES('$Username', '$email', '$password')";
  	mysqli_query($db, $query);
    if ($result) {
      $last_id = mysqli_insert_id($db);
      if($last_id){
        $code = rand(1,9999);
        $user_id = "UC_".$code."_".$last_id;
        $query = "Update register_user SET user_id = '".$user_id."' WHERE id = '".$last_id."'";
        $res = mysqli_query($db,$query);
      }
      $to = $email;
      $subject = "Email Verification Code";
      $message = "Your verification code is $code";
      mail($to, $subject, $message);
      $_SESSION['email'] = "We've sent a verification code to your email - $email!";
      header("Location: verification.php");
  }

  	$_SESSION['username'] = $Username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM register_user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
