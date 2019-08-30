<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  $id = $_GET["id"];

  function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

  $sql = mysqli_query($dbc, "SELECT password FROM admin WHERE id='$id'");
  $row = mysqli_fetch_array($sql);
	$row["password"];
	
?>

<section class="col m4 offset-m4">
	<h4 class="center-align">Change Password</h4>
	<div class="card-panel">
		<?php  

			if (isset($_POST["change_password"]) && !empty($_POST["old_password"]) && !empty($_POST["new_password"]) && !empty($_POST["confirm_password"])) {

					$current_password = md5(test_input($_POST["old_password"]));
					$new_password = test_input($_POST["new_password"]);
					$confirm_password = test_input($_POST["confirm_password"]);
					if($current_password == $row["password"]) {
						if($new_password == $confirm_password){
							$new_password = md5($new_password);
							$query = mysqli_query($dbc, "UPDATE admin SET password = '$new_password' WHERE id='$id'");
							if ($query) {
								echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Password changed sucessfully<i class='close mdi mdi-close'></i></div>";
							}else{
								echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error changing password<i class='close mdi mdi-close'></i></div>";
							}
						}else{
							echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Passwords do not match<i class='close mdi mdi-close'></i></div>";
						}
					}else{
						echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Invalid current password <i class='close mdi mdi-close'></i></div>";
					}
			  }

		?>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="input-field">
		        <i class="mdi mdi-lock prefix"></i>
		        <input id="old_password" type="password" class="validate" value="" name="old_password" required>
		        <label for="old_password">Current password:</label>
		    </div>
			<div class="input-field">
		        <i class="mdi mdi-lock prefix"></i>
		        <input id="new_password" type="password" class="validate" value="" name="new_password" required>
		        <label for="new_password">New password:</label>
		    </div>
		    <div class="input-field">
		        <i class="mdi mdi-lock prefix"></i>
		        <input id="confirm_password" type="password" class="validate" value="" name="confirm_password" required>
		        <label for="confirm_password">Confirm password:</label>
		    </div>
		    <button class="btn waves-effect hoverable btn-large waves-light block teal" type="submit" name="change_password">Change Password</button>
		</form>
	</div>
</section>