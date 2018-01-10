<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

?>
<section class="col s12 m4 offset-m4">
	<h4 class="center-align">Add Course</h4>
<?php  

if(isset($_POST["add_course"]) && !empty($_POST["course"]) && !empty($_POST["course_desc"])){
	$course_name = ucwords($_POST["course"]);
	$course_desc = ucfirst(htmlentities($_POST["course_desc"]));

	$sql_query = "INSERT INTO courses(`course_name`, `course_desc`) VALUES('$course_name', '$course_desc')";

	if(mysqli_query($dbc, $sql_query)){
		echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Course added sucessfully<i class='close mdi mdi-close'></i></div>";
		mysqli_close($dbc);
	}else{
		echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Error adding course<i class='close mdi mdi-close'></i></div>";
		mysqli_close($dbc);
	}
}

?>
	<div class="card-panel">
		<form action="admin.php?action=add_course" method="POST">
			<div class="input-field">
        <i class="mdi mdi-lock-open-outline prefix"></i>
        <input id="course" type="text" class="validate" name="course" required>
        <label for="course">Course Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-file-document-box prefix"></i>
        <textarea name="course_desc" id="course_desc" class="materialize-textarea"></textarea>
        <label for="course_desc">Course Description:</label>
      </div>
      <br>
      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_course">Add Course</button>
		</form>
	</div>
</section>