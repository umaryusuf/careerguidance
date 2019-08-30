
<section class="col s12 m8 offset-m2">
  <h3 class="center-align">All Messages</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Name</th>
          <th data-field="name">Phone</th>
          <th data-field="name">Course</th>
          <th data-field="edit">Read/Reply </th>
      </tr>
    </thead>

    <tbody>
      <?php
      	$sql = "SELECT DISTINCT(a.sender, a.receiver), a.id, b.name, b.phone, c.course_name FROM messages a JOIN counselors b ON a.sender=b.id JOIN courses c ON b.course_id=c.course_id WHERE a.sender='$student_id'";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$id = $course_row["id"];
      		$fullname = $course_row["name"];
          $phone = $course_row["phone"];
          $sender = $course_row["sender"];
          $course = $course_row["course_name"];
          $receiver = $course_row["receiver"];
      ?>
      <tr>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $course; ?></td>
        <td><a href="index.php?action=read_reply&msg_id=<?php echo $id; ?>&sender=<?php echo $sender;?>&receiver=<?php echo $receiver;?>">read/reply</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>