<?php

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $career_id = $_GET["career_id"];

  function check_input($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>
<section class="col s12 m6 offset-m3">
	<h3 class="center-align">Update Career</h3>
	 <?php  
      if (isset($_POST['update_career']) && !empty($_POST["career"]) && !empty($_POST["career_desc"])) {
      	$career_title = $_POST["career"];
      	$career_desc = $_POST["career_desc"];
     
        $query = "UPDATE `career` SET `career_title`='$career_title', `career_desc`='$career_desc' WHERE `career_id`='$career_id'";
        if (mysqli_query($dbc, $query)) {
          echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Career updated sucessfully<i class='close mdi mdi-close'></i></div>";
        }else{
          echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error updating career<i class='close mdi mdi-close'></i></div>";
        }
       
      }
    ?>
	<div class="card-panel">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <?php  

        $query = mysqli_query($dbc, "SELECT career_title, career_desc FROM career WHERE career_id='$career_id'");
        while ($data = mysqli_fetch_array($query)) {

      ?>
			<div class="input-field">
        <i class="mdi mdi-book-open-page-variant prefix"></i>
        <input id="career" type="text" class="validate" value="<?php echo $data["career_title"]; ?>" name="career" required>
        <label for="career">Career Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-file-document-box prefix"></i>
        <textarea name="career_desc" id="career_desc" class="materialize-textarea"><?php echo $data["career_desc"]; ?></textarea>
        <label for="career_desc">Career Description:</label>
      </div>
      <?php } ?>
      <br>
      <button class="btn waves-effect hoverable btn-large waves-light block teal" type="submit" name="update_career">Update career</button>
		</form>
	</div>
</section>