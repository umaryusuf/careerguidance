<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $req_id = $_GET["req_id"];

  $sql = "DELETE FROM `requirements` WHERE `req_id`='$req_id'";

  if(mysqli_query($dbc, $sql)){
  	header("location: admin.php?action=manage_requirements");
  }else{
  	echo "<div class='col s12 m4 offset-m4'><div class='card-panel red lighten-2'><h3 class='center-align'>Error deleting requirement</h3></div></div>";
  	mysqli_close($dbc);
  }

?>