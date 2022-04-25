<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
   if (!isset($_SESSION['user_id'])) {
  //	$_SESSION['msg'] = "You must log in first";
  //	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


  <title>V-CERF</title>
  <link rel="stylesheet" href="style.css" />
</head>

<header class="p-3 bg-dark text-white">
  <div class="container">
  <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong style="padding-right:870px"><?php echo $_SESSION['username'] ; ?></strong>
      <?php endif; ?>
      <?php 
          // initializing variables
              $username = "";
              $email    = "";
              $code= array();
              $errors = array(); 

              // connect to the database
               $db = mysqli_connect('localhost', 'root', '', 'v-cerf');
              $username=$_SESSION['username'] ;
               $query = "SELECT user_id FROM register_user WHERE username='$username'";
               $results = mysqli_query($db, $query);
      ?>
      <?php 
        while ($row = $results->fetch_assoc()):
      ?>

      Your ID-<strong>
      <?php echo $row['user_id'] ; ?>
    </strong></p>
    <?php endwhile ?>
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <h2>V-CERF</h2>
      </a>

      <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      </div>

      <div class="text-end">
        <a href="Login.php"><button type="button" class="btn btn-outline-light">Login</button></a>
        <a href="Register.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
        <a href="index.php?logout='1'" class="btn btn-danger">logout</a>
      </div>
    </div>
  </div>
</header>


<body>

  <div class="b-example-divider"></div>
  <div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h3 class="border-bottom pb-2 mb-0">Recent updates</h3>
      <div class="d-flex text-muted pt-3">
      <img src="aurora-1.jpeg" height="240" width="380">
        <a href="sports.php" style=" margin-bottom :150px;">
          <p class="pb-3 mb-0 small lh-sm border-bottom" style="padding-left: 10px;">
            <strong class="d-block text-gray-dark" style=" font-size: 45px;">AURORA</strong></a>
            Aurora is an intra college event conducted by universal College of engineering 
            which consist of sports and cultural <br>event. Best Sports and Cultural Events in UCOE!
          </p>
      </div>

      <div class="d-flex text-muted pt-3">
        <img src="vyro-1.jpg" height="240" width="380">
        <a href="cultural.html" style=" margin-bottom :150px;">
          <p class="pb-3 mb-0 small lh-sm border-bottom" style="padding-left: 10px;">
            <strong class="d-block text-gray-dark" style=" font-size: 45px;">VYRO</strong></a>
            Technical Event
          </p>
      </div>
      <!-- <small class="d-block text-end mt-3">
        <a href="#">All updates</a>
      </small> -->
    </div>
  </div>

</body>

</html>
