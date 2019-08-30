<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  
?>
<section class="col s12 m6 offset-m3">
  <h3 class="center-align">Manage Admin</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Full Name</th>
          <th data-field="name">Username</th>
          <th data-field="edit">Edit </th>
          <th data-field="edit">Change Password </th>
      </tr>
    </thead>

    <tbody>
      <?php
      	$sql = "SELECT * FROM `admin`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$id = $course_row["id"];
      		$fullname = $course_row["fullname"];
          $username = $course_row["username"];
      ?>
      <tr>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $username; ?></td>
        <td><a href="admin.php?action=update_admin&id=<?php echo $id; ?>">Edit</a></td>
        <td><a href="admin.php?action=change_password&id=<?php echo $id; ?>">Change Password</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>