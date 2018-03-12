

<?php 
	// Connect to database 6470

	$servername = "localhost";
	$username= "Pascal Ekirapa";
	$password= "Pilot9362";
	$dbname = "6470";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		die("Connection failed: " . mysqli_connect_error($connection));
	}
	
 ?>