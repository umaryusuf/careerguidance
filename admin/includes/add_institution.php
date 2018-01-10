<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

?>
<section class="col m4 offset-m4">
	<h3 class="center-align">Add Institution</h3>
	<?php  
	if (isset($_POST["add_institution"]) && !empty($_POST["institution_name"]) && !empty($_POST["website"])) {
		$institution_name = ucwords($_POST["institution_name"]);
		$website = strtolower($_POST['website']);

		$sql = "INSERT INTO institutions(`institution_name`, `website`) VALUES('$institution_name', '$website')";
		$query = @mysqli_query($dbc, $sql);

		if ($query) {
			echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Institution added sucessfully<i class='close mdi mdi-close'></i></div>";
			mysqli_close($dbc);
		}else{
			echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error adding institution<i class='close mdi mdi-close'></i></div>";
			mysqli_close($dbc);
		}
	}

	?>
	<div class="card panel" style="padding: 10px;">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	      <div class="input-field">
	        <i class="mdi mdi-school prefix"></i>
	        <input id="institution_name" type="text" class="validate" name="institution_name" required>
	        <label for="institution_name">Institution Name:</label>
	      </div>
	      <div class="input-field">
	        <i class="mdi mdi-web prefix"></i>
	        <input id="website" type="url" class="validate" name="website" required>
	        <label for="website">Website URL:</label>
	      </div>
	      <br>
	      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_institution">Add institution</button>
		</form>
	</div>
</section>
