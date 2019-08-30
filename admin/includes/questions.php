<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

?>
<section class="col s12 m10 offset-m1">
	<h4 class="center-align">Manage Questions</h4>
  <div class="center-align">
    <a class="btn accent-1" href="admin.php?action=add_question">Add Question</a>
  </div>
  <hr>
	<table class="bordered striped">
    <thead>
      <tr>
        <th data-field="jamb">Question</th>
        <th data-field="jamb">First Option</th>
        <th data-field="jamb">Second Option</th>
        <th data-field="jamb">Answer</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      	$sql = "SELECT * FROM `questions` ORDER BY id DESC";

      	$run_sql = @mysqli_query($dbc, $sql);
      	while($row = mysqli_fetch_array($run_sql)){
      ?>
      <tr>
        <td><?php echo $row["question"];?></td>
        <td><?php echo $row["opt1"]; ?></td>
        <td><?php echo $row["opt2"]; ?></td>
        <td><?php echo $row["answer"]; ?></td>
      </tr>
    	<?php }  ?>
    </tbody>
  </table>
</section>