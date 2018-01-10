<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $id = $_GET["institution_id"];

  $sql = "DELETE FROM `institutions` WHERE `institution_id`='$id'";

  if(mysqli_query($dbc, $sql)){
  	header("location: admin.php?action=manage_institutions");
  }else{
  	echo "<div class='col s12 m4 offset-m4'><div class='card-panel red lighten-2'><h3 class='center-align'>Error deleting institution</h3></div></div>";
  	mysqli_close($dbc);
  }

?>