<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

?>
<section class="col m4 offset-m4">
	<h3 class="center-align">Add Career</h3>
	<?php  
	if (isset($_POST["add_course_career"]) && !empty($_POST["course_id"]) && !empty($_POST["career"]) && !empty($_POST["career_desc"])) {
		$course_id = $_POST["course_id"];
		$career = $_POST["career"];
		$keywords = $_POST["keywords"];
		$career_desc = $_POST["career_desc"];

		$sql = "INSERT INTO career(`course_id`, `career_title`, `career_keywords`, `career_desc`) VALUES('$course_id', '$career', '$keywords', '$career_desc')";

		if (mysqli_query($dbc, $sql)) {
			echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Career added sucessfully<i class='close mdi mdi-close'></i></div>";
		}else{
			echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error adding career <i class='close mdi mdi-close'></i></div>";
		}
	}

	?>
	<div class="card panel" style="padding: 10px;">
		<form action="admin.php?action=add_course_career" method="post">
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
        <input id="career" type="text" class="validate" name="career" required>
        <label for="career">Career Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-book-open-page-variant prefix"></i>
        <input id="keywords" type="text" class="validate" name="keywords" required>
        <label for="keywords">Career Keywords:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-file-document-box prefix"></i>
        <textarea name="career_desc" id="career_desc" class="materialize-textarea"></textarea>
        <label for="career_desc">Career Description:</label>
      </div>
      <br>
      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_course_career">Add Course Career</button>
		</form>
	</div>
</section>
