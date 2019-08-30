<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  
?>
<section class="col s12 m8 offset-m2">
  <h3 class="center-align">Manage Career</h3>
  <div class="center-align">
    <a class="btn accent-1" href="admin.php?action=add_course_career">Add Career</a>
  </div>
  <hr>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Career Title</th>
          <th data-field="desc">Career Description</th>
          <th data-field="edit">Edit </th>
          <th data-field="delete">Delete </th>
      </tr>
    </thead>

    <tbody>
      <?php  
      	$sql = "SELECT * FROM `career`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($row = mysqli_fetch_array($run_sql)){
      		$career_id = $row["career_id"];
      		$career_title = $row["career_title"];
          $career_desc = $row["career_desc"];
      ?>
      <tr>
        <td><?php echo $career_title; ?></td>
        <td><?php echo $career_desc; ?></td>
        <td><a href="admin.php?action=edit_career&career_id=<?php echo $career_id; ?>">Edit</a></td>
        <td><a class="waves-effect waves-light btn red" href="admin.php?action=delete_career&career_id=<?php echo $career_id; ?>">Delete</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>