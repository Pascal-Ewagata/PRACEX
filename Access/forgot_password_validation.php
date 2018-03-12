
<?php require "../connection/connection.php" ?>
<!-- Start with the forgot my password form -->
<form action="forgot_password_validation.php" method="post">
	<div class="form-group">
		<label class="form-label">
			Username <input class="form-control" type="text" name="username_forgot" placeholder="Username" >
		</label>
	</div>
	<div class="form-group">
		<label class="form-label">
			Phone Number <input class="form-control" type="text" name="number_forgot" placeholder="Phone Number">
		</label>
	</div>
	<input type="submit" name="forgot_submit">

</form>


<?php 
	$username_forgot = "";
	$number_forgot = "";
	// Form processing 
	if(isset($_POST['forgot_submit'])){
		// Collect the values 
		$username_forgot = $_POST['username_forgot'];
		$number_forgot = $_POST['number_forgot'];

		$sql_f = "SELECT * FROM 6470users WHERE USERNAME='$username_forgot' ";
		$res_f = mysqli_query($connection, $sql_f);

		if(mysqli_num_rows($res_f) > 0){
			// header("location: forgot_password_execution.php");
			// Display current user password 
			echo "Dear $username_forgot, reset password:";
			echo "<form action='forgot_password_validation.php' method='post'>";
				echo "<div class='form-group'> <label class='form-label'>";
				echo "New Password <input class='form-control' type='password' name='updated_pass' ";
				echo "</label> </div>";
				echo "<input type='submit' name='update_pass_submit' value='Update Password'> ";
				echo "</form>";

			// Form processing 
				if(isset($_POST['update_pass_submit'])){
					$updated_forgot_pass = $_POST['updated_pass'];
					$updated_forgot_pass_hash = sha1($updated_forgot_pass);

					$sql_uf = "UPDATE 6470users SET PASSWORD_HASH='$updated_forgot_pass_hash' WHERE USERNAME='$username_forgot' ";
					$res_uf = mysqli_query($connection, $sql_uf);
					if(!$res_uf){
						die("No result returned: " . mysqli_error($connection));
					}

				}
			}
		}
	
			?>
			<!-- <form action="forgot_password_validation.php" method="post">
				<div class="form-group">
					<label class="form-label">
						New Password <input class="form-control" type="password" name="updated_pass">
					</label>
				</div>
				<input type="submit" name="update_pass_submit" value="Update Password">
			</form>

 -->
