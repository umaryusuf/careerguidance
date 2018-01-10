<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  $site_url = "";
  
?>
<section class="col s12 m8 offset-m2">
  <h3 class="center-align">Manage Institutions</h3>
	<table class="bordered striped">
    <thead>
      <tr> 
          <th data-field="institution">Institution Name</th>
          <th data-field="url">Websites URL </th>
          <th data-field="edit">Edit </th>
          <th data-field="delete">Delete </th>
      </tr>
    </thead>

    <tbody>
      <?php  
      	$sql = "SELECT * FROM `institutions`";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($row = mysqli_fetch_array($run_sql)){
      		$id = $row["institution_id"];
          $institution_name = $row["institution_name"];
      		$website = $row["website"];

      ?>
      <tr>
        <td><?php echo $institution_name; ?></td>
        <td><?php echo $website; ?></td>
        <td><a href="admin.php?action=edit_institution&institution_id=<?php echo $id; ?>">Edit</a></td>
        <td><a class="waves-effect waves-light btn red" href="admin.php?action=delete_institution&institution_id=<?php echo $id; ?>">Delete</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>