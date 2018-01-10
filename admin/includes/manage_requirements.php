<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  
?>
<section class="col s12 m10 offset-m1">
  <h3 class="center-align">Manage Course Requirements</h3>
	<table class="bordered striped">
    <thead>
      <tr>
        <th data-field="jamb">Institution</th>
        <th data-field="jamb">Course</th>
        <th data-field="jamb">Jamb Subjects</th>
        <th data-field="jamb">Jamb Score</th>
        <th data-field="waec">WAEC Passes</th>
        <th data-field="edit">Edit </th>
        <th data-field="delete">Delete </th>
      </tr>
    </thead>

    <tbody>
      <?php  
      	$sql = "SELECT * FROM `requirements`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($row = mysqli_fetch_array($run_sql)){
      		$req_id = $row["req_id"];
          $id = $row["institution_id"];
          $course_id = $row["course_id"];
      		$jamb_subjects = $row["jamb_subjects"];
          $jamb_score = $row["jamb_score"];
          $waec_passes = $row["waec_passes"];
      ?>
      <tr>
        <td>
          <?php 
            $query = mysqli_query($dbc, "SELECT institution_name FROM institutions WHERE institution_id='$id'");
            $data = mysqli_fetch_array($query);
            echo $data["institution_name"];
          ?> 
        </td>
        <td>
          <?php 
            $query = mysqli_query($dbc, "SELECT course_name FROM courses WHERE course_id='$course_id'");
            $data = mysqli_fetch_array($query);
            echo $data["course_name"];
          ?>
        </td>
        <td><?php echo $jamb_subjects; ?></td>
        <td><?php echo $jamb_score; ?></td>
        <td><?php echo $waec_passes; ?></td>
        <td><a href="admin.php?action=edit_requirements&req_id=<?php echo $req_id; ?>&institution_id=<?php echo $id; ?>&course_id=<?php echo $course_id; ?>">Edit</a></td>
        <td><a class="waves-effect waves-light btn red" href="admin.php?action=delete_requirement&req_id=<?php echo $req_id; ?>">Delete</a></td>
      </tr>
    	<?php }  ?>
    </tbody>
  </table>
</section>