

<?php require "../connection/connection.php" ?>

<!-- The registration form should be written here -->
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Link to Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.css">
	<!-- Link to custom CSS -->
	<link rel="stylesheet" type="text/css" href="registration.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
				<!-- <div class="container-fluid"> -->
					<!-- <div class="navbar-header">
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div> -->
					<ul class="nav navbar-nav li-nav">
						<li class="active"><a href="../Main/index.php">Home</a></li>
						<li><a href="registration.php">Register</a></li>
						<li><a href="login_form.php">Log In</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav li-nav navbar-right">
						<li class="active"><a href="#">Jobs</a></li>
					</ul>
				<!-- </div> -->
			</nav>
	<div class="container-fluid">
		<div class="form">
			<div class="well">
				<form class="style-form" action="registration.php" method="post">
					<div class="form-group">
						<label class="form-label">
							Username <input class="form-control" type="text" name="username" placeholder="Username" >
						</label>
					</div>
					<div class="form-group">
						<label class="form-label">
							Password <input class="form-control" type="password" name="password" placeholder="Password" >
						</label>
					</div>
					<div class="form-group">
						<label class="form-label">
							Phone Number <input class="form-control" type="text" name="phone_no" placeholder="Phone Number">
						</label>
					</div>
					<input type="submit" name="register_user" value="Register">
					<p>Already a user? <a href="login_form.php">Log In</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>


<?php 
	// Now, collect the values from the form 
	if(isset($_POST['register_user'])){
		$name = $_POST['username'];
		$phone_no = $_POST['phone_no'];
		$unconverted_password = $_POST['password'];
		$converted_password = sha1($unconverted_password);

		// $check = "SELECT * FROM 6470users WHERE NAME='$name' ";
		// $check_exec = mysqli_query($connection, $check);
		
		$insert_details = "INSERT INTO 6470users (USERNAME, PASSWORD_HASH, PHONE) VALUES ('$name', '$converted_password', '$phone_no') ";
		$insert_details_exec = mysqli_query($connection, $insert_details);

		if(!$insert_details_exec && mysqli_affected_rows($connection) > 0){
			echo "<h1> Insert unsuccessful:  </h1>" . mysqli_error($connection);
		}
		// Refresh once insert is completed
		if(mysqli_affected_rows($connection) > 0){
			header("location: ../Dashboard/landing_page.php");
		}	
			
	}

 ?>