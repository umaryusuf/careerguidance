<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $career_id = $_GET["career_id"];

  $sql = "DELETE FROM `career` WHERE `career_id`='$career_id'";

  if(mysqli_query($dbc, $sql)){
  	header("location: admin.php?action=manage_career");
  }else{
  	echo "<div class='col s12 m4 offset-m4'><div class='card-panel red lighten-2'><h3 class='center-align'>Error deleting career</h3></div></div>";
  	mysqli_close($dbc);
  }

?>