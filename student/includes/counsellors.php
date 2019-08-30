
<section class="col s12 m8 offset-m2">
  <h3 class="center-align">All Counsellors</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Full Name</th>
          <th data-field="name">Phone</th>
          <th data-field="edit">Course </th>
          <th data-field="edit">Message </th>
      </tr>
    </thead>

    <tbody>
      <?php
      	$sql = "SELECT a.id, a.name, a.phone, b.course_name FROM counselors a JOIN courses b ON a.course_id=b.course_id ORDER BY a.id DESC";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$id = $course_row["id"];
      		$fullname = $course_row["name"];
          $course = $course_row["course_name"];
          $phone = $course_row["phone"];
      ?>
      <tr>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $course; ?></td>
        <td><a href="index.php?action=message&user=<?php echo $id; ?>">message counsellor</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>