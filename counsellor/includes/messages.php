<section class="col s12 m8 offset-m2">
  <h3 class="center-align">All Messages</h3>
	<table class="bordered striped">
    <thead>
      <tr>
          <th data-field="name">Name</th>
          <th data-field="name">Phone</th>
          <th data-field="edit">Read/Reply </th>
      </tr>
    </thead>

    <tbody>
      <?php
      	$sql = "SELECT DISTINCT(a.sender), a.id, a.receiver, b.fullname, b.phone FROM messages a JOIN students b ON a.sender=b.student_id WHERE (a.receiver='$counsellor_id' OR a.receiver='$counsellor_id')";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($course_row = mysqli_fetch_array($run_sql)){
      		$id = $course_row["id"];
      		$fullname = $course_row["fullname"];
          $phone = $course_row["phone"];
          $sender = $course_row["sender"];
          $receiver = $course_row["receiver"];
      ?>
      <tr>
        <td><?php echo $fullname; ?></td>
        <td><?php echo $phone; ?></td>
        <td><a href="index.php?action=read_reply&msg_id=<?php echo $id; ?>&sender=<?php echo $sender;?>&receiver=<?php echo $receiver;?>">read/reply</a></td>
      </tr>
    	<?php } ?>
    </tbody>
  </table>
</section>