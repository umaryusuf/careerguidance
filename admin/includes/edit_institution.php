<?php

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $id = $_GET["institution_id"];

  function check_input($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>
<section class="col s12 m6 offset-m3">
	<h3 class="center-align">Update Institution</h3>
	 <?php  
      if (isset($_POST['update_institution']) && !empty($_POST["institution_name"]) && !empty($_POST["website"])) {
      	$institution_name = $_POST["institution_name"];
      	$website = $_POST["website"];
     
        $query = "UPDATE `institutions` SET `institution_name`='$institution_name', `website`='$website' WHERE `institution_id`='$id'";
        if (mysqli_query($dbc, $query)) {
          echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>institution updated sucessfully<i class='close mdi mdi-close'></i></div>";
        }else{
          echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error updating institution<i class='close mdi mdi-close'></i></div>";
        }
       
      }
    ?>
	<div class="card-panel">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="input-field">
        <i class="mdi mdi-school prefix"></i>
        <?php  
        $sql = "SELECT * FROM `institutions` WHERE `institution_id`='$id'";
        $run_sql = @mysqli_query($dbc, $sql);
        while ($data = mysqli_fetch_array($run_sql)) {
        	$institution_name = $data["institution_name"];
        	$website = $data["website"];
        ?>
        <input id="institution_name" type="text" class="validate" value="<?php echo $institution_name; ?>" name="institution_name" required autofocus>
        <label for="institution_name">Institution Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-web prefix"></i>
        <input id="website" type="url" class="validate" value="<?php echo $website; ?>" name="website" required autofocus>
        <?php } ?>
        <label for="website">Website:</label>
      </div>
      <br>
      <button class="btn waves-effect hoverable btn-large waves-light block teal" type="submit" name="update_institution">Update institution</button>
		</form>
	</div>
</section>