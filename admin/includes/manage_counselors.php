<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  
?>
<section class="col s12 m10 offset-m1">
  <h3 class="center-align">Manage Counselors</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Course Name</th>
          <th data-field="cname">Counselor Name</th>
          <th data-field="mail">Counselor Mail</th>
          <th data-field="phone">Counselor Phone</th>
          <th data-field="edit">Edit </th>
          <th data-field="delete">Delete </th>
      </tr>
    </thead>

    <tbody>
      <?php  
      	$sql = "SELECT * FROM `counselors`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($row = mysqli_fetch_array($run_sql)){
      		$course_id = $row["course_id"];
      		
      ?>
      <tr>
        <td>
          <?php  
          $gq = mysqli_query($dbc, "SELECT course_name FROM courses WHERE course_id='$course_id'");
          $d = mysqli_fetch_array($gq);
          echo $d["course_name"];
          ?>
        </td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><a href="admin.php?action=edit_counselor&id=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a class="waves-effect waves-light btn red" href="admin.php?action=delete_couselor&id=<?php echo $row['id']; ?>">Delete</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>