<?php

	if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $req_id = $_GET["req_id"];
  $id = $_GET["institution_id"];
  $course_id = $_GET["course_id"];

  function check_input($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>
<section class="col s12 m6 offset-m3">
	<h3 class="center-align">Update Requirements</h3>
	 <?php  
      if (isset($_POST['update_requirement']) && !empty($_POST["jamb_subjects"]) && !empty($_POST["jamb_score"]) && !empty($_POST["waec_subjects"])) {
      	
        $jamb_subjects = $_POST["jamb_subjects"];
        $jamb_score = $_POST["jamb_score"];
        $waec_subjects = $_POST["waec_subjects"];
     
        $query = "UPDATE `requirements` SET `jamb_subjects`='$jamb_subjects', `jamb_score`='$jamb_score', `waec_passes`='$waec_subjects' WHERE `req_id`='$req_id'";
        if (mysqli_query($dbc, $query)) {
          echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Course requirements updated sucessfully<i class='close mdi mdi-close'></i></div>";
        }else{
          echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error updating course requirements<i class='close mdi mdi-close'></i></div>";
        }
       
      }
    ?>
	<div class="card-panel">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="row">
        <div class="input-field col s12 m12">
          <i class="mdi mdi-library-books prefix"></i>
          <select>
            <?php  
              $sql = "SELECT `course_name` FROM `courses` WHERE course_id='$course_id'";
              $query = @mysqli_query($dbc, $sql);
              while ($data = mysqli_fetch_array($query)) {
                $course_name = $data["course_name"];
            ?>
            <option value="" disabled selected><?php echo $course_name; ?></option>
            <?php } ?>
          </select>
          <label>Course</label>
        </div>
        <div class="input-field col s12 m12">
          <i class="mdi mdi-library-books prefix"></i>
          <select>
            <?php  
              $sql = "SELECT * FROM `institutions` WHERE institution_id='$id'";
              $query = @mysqli_query($dbc, $sql);
              while ($data = mysqli_fetch_array($query)) {
                $institution_name = $data["institution_name"];
            ?>
            <option value="" disabled selected><?php echo $institution_name; ?></option>
            <?php } ?>
          </select>
          <label>Instutution</label>
        </div>
      </div>
      <?php  

        $sql = mysqli_query($dbc, "SELECT jamb_subjects, jamb_score, waec_passes FROM requirements WHERE req_id='$req_id'");
        while ($data = mysqli_fetch_array($sql)) {
          $jamb_subjects = $data["jamb_subjects"];
          $jamb_score = $data["jamb_score"];
          $waec_passes = $data["waec_passes"];

      ?>
      <div class="input-field">
        <i class="mdi mdi-book-open-page-variant prefix"></i>
        <input id="jamb_subjects" type="text" value="<?php echo $jamb_subjects; ?>" class="validate" name="jamb_subjects" required>
        <label for="jamb_subjects">Jamb Subjects:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-account-star-variant prefix"></i>
        <input id="jamb_score" type="number" value="<?php echo $jamb_score; ?>" class="validate" min="100" max="400" name="jamb_score" required>
        <label for="jamb_score">Jamb Score:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-book-open-page-variant prefix"></i>
        <input id="waec_subjects" type="text" value="<?php echo $waec_passes; ?>" class="validate" name="waec_subjects" required>
        <label for="waec_subjects">WAEC Pases:</label>
      </div>
      <?php } ?>
      <br>
      <button class="btn waves-effect hoverable btn-large waves-light block teal" type="submit" name="update_requirement">Update requirement</button>
		</form>
	</div>
</section>