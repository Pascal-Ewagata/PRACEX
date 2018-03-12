

<?php require "../connection/connection.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Link to Bootstrap CSS --> 
	<link rel="stylesheet" type="text/css" href="../Bootstrap/css/bootstrap.css">
	<!-- Link to custom CSS --> 
	<link rel="stylesheet" type="text/css" href="login_form.css">
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
				<form action="login_form.php" method="post">
					<div class="form-group">
						<label class="form-label">
							Username <input class="form-control" type="text" name="username_li" placeholder="Username" required>
						</label>
					</div>
					<div class="form-group">
						<label class="form-label">
							Password <input class="form-control" type="password" name="password_li" placeholder="Password" required>
						</label>
					</div>
					<input type="submit" name="login" value="Log In">
					<p>Not yet a user? <a href="registration.php">Register</a></p>
					<p><a href="forgot_password_validation.php">Forgot Password?</a></p>
				</form>
			</div>
		</div>
	</div>

	<!-- Now, form processing --> 
	<?php 
		$username_li = "";
		$password_converted = "";
		// Start by collecting values from the form 
		if(isset($_POST['login'])){
			$username_li = $_POST['username_li'];
			$password_raw = $_POST['password_li'];
			$password_converted = sha1($password_raw);

			$sql_u = "SELECT * FROM 6470users WHERE USERNAME='$username_li' AND PASSWORD_HASH='$password_converted' ";
			$res_u = mysqli_query($connection, $sql_u);

			if(mysqli_num_rows($res_u) > 0){
				header("location: ../Dashboard/landing_page.php");
			}else{
				echo " Incorrect credentials ";
				// echo "Not yet a user? <a href='registration.php'> Register </a>. <br> <a href='forgot_password_validation.php'>Forgot password?</a>";
			}
		}
	 ?>

</body>
</html>