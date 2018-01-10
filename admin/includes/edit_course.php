<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $message = "";
  $course_id = $_GET["course_id"];
?>
<section class="col m4 offset-m4">
	<h3 class="center-align">Update Course</h3>
	<div class="card-panel">
    <?php  
      if (isset($_POST['update_course'])) {

        if (!empty($_POST['course'])) {
          $course_name = check_input($_POST['course']);
          $query = "UPDATE `courses` SET `course_name`='$course_name' WHERE `course_id`='$course_id'";
          if (mysqli_query($dbc, $query)) {
            echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>course updated sucessfully<i class='close mdi mdi-close'></i></div>";
          }else{
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error updating course<i class='close mdi mdi-close'></i></div>";
          }
        }
       
      }
    ?>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="input-field">
        <i class="mdi mdi-account-card-details prefix"></i>
        <?php  
        $sql = "SELECT * FROM `courses` WHERE `course_id`='$course_id'";
        $run_sql = @mysqli_query($dbc, $sql);
        while ($data = mysqli_fetch_array($run_sql)) {
        	$course_name = $data["course_name"];
        ?>
        <input id="course" type="text" class="validate"value="<?php echo $course_name; ?>" name="course" required autofocus>
        <?php } ?>
        <label for="course">Course Name:</label>
      </div>
      <br>
      <button class="btn waves-effect hoverable waves-light block teal lighten-2" type="submit" name="update_course">Update Course</button>
		</form>
	</div>
</section>
<?php  
function check_input($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>