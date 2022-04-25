<?php
include("connection.php");
?>

<!DOCTYPE html>
<html>

<title>SPORTS FORM</title>
<link rel="stylesheet" type="text/css" href="google f.css">
<link rel="stylesheet" href="sports.css">
</head>

<body>

	<div class="form">
		<form method="post" >
		<div class="title-div">
			<h1>SPORT EVENTS</h1>
			<p>This is a Sports form. This form is created with HTML and CSS.</p>
			<p class="required">*Required</p>
		</div>
		
		<div class="name-div">
			<div class="name">User ID<span class="required">*</span></div>
			<div class="input-div"><input type="input" name="User_id" placeholder="Your answer"></div>
		</div>

		<div class="college-div">
			<div class="name">College Name</div>
			<div class="input-div"><input type="input" name="College" placeholder="Your answer"></div>
		</div>

		<div class="gmail-div">
			<div class="name">Email<span class="required">*</span></div>
			<div class="input-div"><input type="input" name="Email" placeholder="Your email"></div>
		</div>

		<div class="branch-div">
			<div class="name">Branch<span class="required">*</span></div>
			<div class="input-div"><input type="input" name="Branch" placeholder="Your Branch"></div>
		</div>

		<div class="year-div">
			<div class="name">Year<span class="required">*</span></div>
			<select class="custom-select" name="Year" style="margin: 25px 0px 0px 25px;">
				<option selected hidden value=" ">Select Year</option>
				<option value="FE">FE</option>
				<option value="SE">SE</option>
				<option value="TE">TE</option>
				<option value="BE">BE</option>
			</select>
		</div>

		<div class="event-div">
			<div class="name">Events<span class="required">*</span></div>
				<div class="group" style="padding-left:10px;">
					<input type="checkbox" name="Event[]" values="Football">Football<br>

					<input type="checkbox" name="Event[]" values="Cricket">Cricker<br>

					<input type="checkbox" name="Event[]" values="Volleyball">Volleyball<br>

					<input type="checkbox" name="Event[]" values="MixVolleyball" >Mix-Volleyball<br>

					<input type="checkbox" name="Event[]" values="Kabaddi" >Kabaddi<br>

					<input type="checkbox" name="Event[]" values="Badminton" >Badminton<br>

					<input type="checkbox" name="Event[]" values="Kho-Kho" >Kho-Kho<br>

					<input type="checkbox" name="Event[]" values="Carrom" >Carrom<br>

					<input type="checkbox" name="Event[]" values="Chess" >Chess<br>

					<input type="checkbox" name="Event[]" values="TugofWar" >Tug of War<br>

					<input type="checkbox" name="Event[]" values="TableTennis" >Table Tennis<br>

					<input type="checkbox" name="Event[]" values="Sprint100M" >Sprint 100M<br>

					<input type="checkbox" name="Event[]" values="Sprint200M" >Sprint 200M<br>

					<input type="checkbox" name="Event[]" values="Sprint400M" >Sprint 400M<br>

					<input type="checkbox" name="Event[]" values="LongJump" >Long Jump<br>

					<input type="checkbox" name="Event[]" values="TripleJump" >Triple Jump<br>

					<input type="checkbox" name="Event[]" values="Langadi100M"  >Langadi 100M<br>

					<input type="checkbox" name="Event[]" values="Relay"> Relay<br>

					<input type="checkbox" name="Event[]" values="MixRelay" > Mix-Relay<br>
					
					<input type="checkbox" name="Event[]" values="ShotPut" > ShotPut<br>

					<input type="checkbox" name="Event[]" values="FemBoxCricket" >Box Cricker(Female)<br>
					
					<input type="checkbox" name="Event[]" values="FemLangadi" >Langadi(Female)<br>

					<input type="checkbox" name="Event[]" values="FemThrowball" >Throwball(Female)<br>
					
					<input type="checkbox" name="Event[]" values="FemDodgeball" >Dodgeball(Female)<br>
					
				</div>
		</div>

		<div class="mobile-div">
			<div class="name">Enter your mobile no.</div>
			<div class="input-div"><input type="input" name="Mobile" placeholder="Your answer"></div>
		</div>

		<div style="padding-left: 250px;">
			<button type="Submit" class="btn" name="Register">Submit</button> 
		</div>
	</form>
	</div>

</body>



</html>
<?php
if (isset($_POST['Register'])) {
	$User_id = $_POST['User_id'];
	$College = $_POST['College'];
	$Email = $_POST['Email'];
	$Branch = $_POST['Branch'];
	$Year = $_POST['Year'];
	$Mobile = $_POST['Mobile'];
	$Event = $_POST['Event'];
	$Events = "";
	foreach($Event as $row){
		$Events .= $row . ",";
	}

			$query = "INSERT INTO sports_entries (User_id, College, Email, Branch, Year, Event, Mobile) 
				VALUES('$User_id','$College', '$Email', '$Branch', '$Year', '$item','$Mobile')" ;
 			$query_run = mysqli_query($conn, $query);

		 if($query_run){
			 $_SESSION['status']= "Registered successfully";
			 header ('location : sports.php');
		 }
		 else{
			 $_SESSION['status'] = "Unable to register";
			 header('location: sports.php');
		 }
	
	// $hostURL = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "v-cerf";
    // $conn = mysqli_connect($hostURL, $dbUsername, $dbPassword, $dbName);
	

//	header('location: sports.php');
}
?>
