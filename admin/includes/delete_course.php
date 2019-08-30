<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $course_id = $_GET["course_id"];

  $sql = "DELETE FROM `courses` WHERE `course_id`='$course_id'";

  if(mysqli_query($dbc, $sql)){
  	header("location: admin.php?action=manage_courses");
  }else{
  	echo "<div class='col s12 m4 offset-m4'><div class='card-panel red lighten-2'><h3 class='center-align'>Error deleting course</h3></div></div>";
  	mysqli_close($dbc);
  }

?>