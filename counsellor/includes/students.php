
<section class="col s12 m8 offset-m2">
  <h3 class="center-align">All Students</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Full Name</th>
          <th data-field="name">Email</th>
          <th data-field="edit">Phone </th>
          <th data-field="edit">Message </th>
      </tr>
    </thead>

    <tbody>
      <?php
      	$sql = "SELECT * FROM `students` ORDER BY id DESC";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$id = $course_row["id"];
      		$fullname = $course_row["fullname"];
          $email = $course_row["email"];
          $phone = $course_row["phone"];
      ?>
      <tr>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $phone; ?></td>
        <td><a href="index.php?action=read_reply&sender=<?php echo $id; ?>">message student</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>