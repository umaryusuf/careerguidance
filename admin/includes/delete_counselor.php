<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $cid = $_GET["id"];

  $sql = "DELETE FROM `counselors` WHERE `id`='$cid'";

  if(mysqli_query($dbc, $sql)){
  	echo '<script>window.open("admin.php?action=manage_counselors", "_self")</script>';
  }else{
  	echo "<div class='col s12 m4 offset-m4'><div class='card-panel red lighten-2'><h3 class='center-align'>Error deleting counselor</h3></div></div>";
  	mysqli_close($dbc);
  }

?>