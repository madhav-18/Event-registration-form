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
			<p>Enter the details required to register your self for the event.</p>
			<p class="required">* is Required</p>
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
					<input type="checkbox" name="Events[]" value="Football">Football<br>

					<input type="checkbox" name="Events[]" value="Cricket">Cricker<br>

					<input type="checkbox" name="Events[]" value="Volleyball">Volleyball<br>

					<input type="checkbox" name="Events[]" value="MixVolleyball" >Mix-Volleyball<br>

					<input type="checkbox" name="Events[]" value="Kabaddi" >Kabaddi<br>

					<input type="checkbox" name="Events[]" value="Badminton" >Badminton<br>

					<input type="checkbox" name="Events[]" value="Kho-Kho" >Kho-Kho<br>

					<input type="checkbox" name="Events[]" value="Carrom" >Carrom<br>

					<input type="checkbox" name="Events[]" value="Chess" >Chess<br>

					<input type="checkbox" name="Events[]" value="TugofWar" >Tug of War<br>

					<input type="checkbox" name="Events[]" value="TableTennis" >Table Tennis<br>

					<input type="checkbox" name="Events[]" value="Sprint100M" >Sprint 100M<br>

					<input type="checkbox" name="Events[]" value="Sprint200M" >Sprint 200M<br>

					<input type="checkbox" name="Events[]" value="Sprint400M" >Sprint 400M<br>

					<input type="checkbox" name="Events[]" value="LongJump" >Long Jump<br>

					<input type="checkbox" name="Events[]" value="TripleJump" >Triple Jump<br>

					<input type="checkbox" name="Events[]" value="Langadi100M"  >Langadi 100M<br>

					<input type="checkbox" name="Events[]" value="Relay"> Relay<br>

					<input type="checkbox" name="Events[]" value="MixRelay" > Mix-Relay<br>
					
					<input type="checkbox" name="Events[]" value="ShotPut" > ShotPut<br>

					<input type="checkbox" name="Events[]" value="FemBoxCricket" >Box Cricker(Female)<br>
					
					<input type="checkbox" name="Events[]" value="FemLangadi" >Langadi(Female)<br>

					<input type="checkbox" name="Events[]" value="FemThrowball" >Throwball(Female)<br>
					
					<input type="checkbox" name="Events[]" value="FemDodgeball" >Dodgeball(Female)<br>
					
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
	$Events = $_POST['Events'];
	$Event = "";
	foreach($Events as $row){
		$Event .= $row . ",";
	}

			$query = "INSERT INTO sports_entries (User_id, College, Email, Branch, Year, Events, Mobile) 
				VALUES('$User_id','$College', '$Email', '$Branch', '$Year', '$Event','$Mobile')" ;
 			$query_run = mysqli_query($conn, $query);

		 if($query_run){
			 $_SESSION['status']= "Registered successfully";
		 }
		 else{
			 $_SESSION['status'] = "Unable to register";
		 }
	
	// $hostURL = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "v-cerf";
    // $conn = mysqli_connect($hostURL, $dbUsername, $dbPassword, $dbName);
	

//	header('location: sports.php');
}
?>
