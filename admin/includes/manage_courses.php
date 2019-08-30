<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  
?>
<section class="col s12 m6 offset-m3">
  <h3 class="center-align">Manage Courses</h3>
  <div class="center-align">
    <a class="btn accent-1" href="admin.php?action=add_course">Add Course</a>
  </div>
  <hr>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Course Name</th>
          <th data-field="edit">Edit </th>
          <th data-field="delete">Delete </th>
      </tr>
    </thead>

    <tbody>
      <?php  
      	$sql = "SELECT * FROM `courses`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$course_id = $course_row["course_id"];
      		$course_name = $course_row["course_name"];
      ?>
      <tr>
        <td><?php echo $course_name; ?></td>
        <td><a href="admin.php?action=edit_course&course_id=<?php echo $course_id; ?>">Edit</a></td>
        <td><a class="waves-effect waves-light btn red" href="admin.php?action=delete_course&course_id=<?php echo $course_id; ?>">Delete</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>