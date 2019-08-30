<?php  
  function check_input($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

 $error = false;

 $courseErr = $institutionErr = $jamb_scoreErr = $jamb_subjectsErr = $waec_subjectsErr = "";
?>
<section class="col m6 offset-m3">
	<h3 class="center-align">Add course requirement</h3>
	<?php  
	if (isset($_POST["add_course_requirements"])) {
		if(empty($_POST["course_id"])){
			$courseErr = "Oops course not selected";
			$error = true;
		}else{
			$course_id = check_input($_POST["course_id"]);
		}

		if (empty($_POST["id"])){
			$institutionErr = "institution is empty";
			$error = true;
		} else {
			$id = check_input($_POST["id"]);
		}

		if (empty($_POST["jamb_score"])) {
			$jamb_scoreErr = "Empty jamb score";
			$error = true;
		} else {
			$jamb_score = check_input($_POST["jamb_score"]);
		}

		if (empty($_POST["jamb_subjects"])) {
			$jamb_subjectsErr = "Jamb score is empty";
			$error = true;
		} else {
			$jamb_subjects = check_input($_POST["jamb_subjects"]);
		}

		if (empty($_POST["waec_subjects"])) {
			$waec_subjectsErr = "WAEC pases is empty";
			$error = true;
		} else {
			$waec_subjects = check_input($_POST["waec_subjects"]);
		}

		if(!$error){

			$sql = "INSERT INTO requirements(`id`,`course_id`, `jamb_subjects`, `jamb_score`, `waec_passes`) VALUES('$id', '$course_id', '$jamb_subjects', '$jamb_score', '$waec_subjects')";

			if (mysqli_query($dbc, $sql)) {
				echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Course requirements added sucessfully<i class='close mdi mdi-close'></i></div>";
			}
		}

		if(!empty($institutionErr)){
      echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$institutionErr."<i class='close mdi mdi-close'></i></div>";
    }
    if(!empty($courseErr)){
      echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$courseErr."<i class='close mdi mdi-close'></i></div>";
    }
    if(!empty($jamb_scoreErr)){
      echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$jamb_scoreErr."<i class='close mdi mdi-close'></i></div>";
    }
    if(!empty($jamb_subjectsErr)){
      echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$jamb_subjectsErr."<i class='close mdi mdi-close'></i></div>";
    }
    if(!empty($waec_subjectsErr)){
      echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$waec_subjectsErr."<i class='close mdi mdi-close'></i></div>";
    }

	}

	?>
	<div class="card panel" style="padding: 10px;">
		<form action="admin.php?action=add_course_requirement" method="post">
			<div class="row">
			<?php  
				$sql = "SELECT * FROM `questions` LIMIT 10";
				$query = @mysqli_query($dbc, $sql);
				while ($data = mysqli_fetch_array($query)) {
					$id = $data["id"];
			?>
				<div class="input-field col s12 m12">
					<i class="mdi mdi-library-books prefix"></i>
			    <select name="<?php echo $data['id'] ?>">
			      <option value="" disabled selected>Choose an institution</option>
			      <option value="<?php echo $data["opt1"]; ?>"><?php echo $data["opt1"]; ?></option>
						<option value="<?php echo $data["opt2"]; ?>"><?php echo $data["opt2"]; ?></option>
			    </select>
			    <label><?php echo $data["question"] ?></label>
			  </div>
			<?php } ?>
			  
      <br>
      <button class="btn waves-effect hoverable waves-light block teal btn-large" type="submit" name="add_course_requirements">Add Course requirements</button>
		</form>
	</div>
</section><?php 
	
	echo "take a test";