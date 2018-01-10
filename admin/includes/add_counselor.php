<section class="col m4 offset-m4">
	<h3 class="center-align">Add Counselor</h3>
	<?php  
		if (isset($_POST["add_counselor"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$c_id = $_POST["course_id"];
			$name = trim($_POST["name"]);
			$email = trim($_POST["email"]);
			$phone = trim($_POST["phone"]);

			$sql = "INSERT INTO counselors(course_id, name, email, phone) VALUES('$c_id', '$name', '$email', '$phone')";

			if (mysqli_query($dbc, $sql)) {
			echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Counselor added sucessfully<i class='close mdi mdi-close'></i></div>";
			}else{
				echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error adding counselor <i class='close mdi mdi-close'></i></div>";
			}

		}
	?>
	<div class="card panel" style="padding: 10px;">
		<form action="admin.php?action=add_counselor" method="post">
			<div class="input-field ">
				<i class="mdi mdi-library-books prefix"></i>
		    <select name="course_id">
		      <option value="" disabled selected>Choose a course</option>
		      <?php  
		      	$sql = "SELECT * FROM `courses`";
		      	$query = @mysqli_query($dbc, $sql);
		      	while ($data = mysqli_fetch_array($query)) {
		      		$course_id = $data["course_id"];
		      		$course_name = $data["course_name"];
		      ?>
		      <option value="<?php echo $course_id; ?>"><?php echo $course_name; ?></option>
		      <?php } ?>
		    </select>
		    <label>Select Course</label>
		  </div>
      <div class="input-field">
        <i class="mdi mdi-book-open-page-variant prefix"></i>
        <input id="name" type="text" class="validate" name="name" required>
        <label for="name">Counselor Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-email prefix"></i>
        <input id="email" type="email" class="validate" name="email" required>
        <label for="email">Counselor Email:</label>
      </div>
    	<div class="input-field">
        <i class="mdi mdi-phone prefix"></i>
        <input id="phone" type="tel" class="validate" name="phone" required>
        <label for="phone">Counselor Phone:</label>
      </div>
      <br>
      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_counselor">Add Counselor</button>
		</form>
	</div>
</section>