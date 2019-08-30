<section class="col s12 m8 offset-m2">
<h4 class="center-align">Student Scores</h4>
<hr>
<table class="bordered striped">
  <thead>
    <tr>
      <th data-field="jamb">Full Name</th>
      <th data-field="jamb">Question</th>
      <th data-field="jamb">Answer</th>
      <th data-field="jamb">Method</th>
    </tr>
  </thead>
  <tbody>
    <?php  
      $sql = "SELECT a.id, a.student_id, b.fullname, a.question, a.answer FROM scores a JOIN students b ON a.student_id=b.id ORDER BY id DESC";

      $run_sql = @mysqli_query($dbc, $sql);
      while($row = mysqli_fetch_array($run_sql)){
    ?>
    <tr>
      <td><?php echo $row["fullname"];?></td>
      <td><?php echo $row["question"]; ?></td>
      <td><?php echo $row["answer"]; ?></td>
      <td><a href="index.php?action=read_reply&sender=<?php echo $id; ?>">message student</a></td>
    </tr>
    <?php }  ?>
  </tbody>
</table>
</section>