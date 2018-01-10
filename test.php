<?php 
$page_title = "test"; 
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Test | Career Guidance</title>

	<!-- links to favicon, fonts & external css -->
	<?php require_once 'includes/external.php'; ?>

</head>
<body>
	<!-- links to navigation -->
	<?php require_once 'includes/nav.php'; ?>

	<section class="section">
		<div class="card-panel">
			<h3 class="center-align">Test Yourself</h3>
		</div>
		<div class="container">
			<div class="row">
				<div class="col m6 offset-m3">
					<?php
						$error = false;
						$institution_id_err = $course_id_err = $children_schooling_err = $medical_insurance_err = $job_security_err = $culture_err = $interest_err = $financial_status_err = $computer_skills_err = $office_experience_err = "";

						if (isset($_POST['check'])) {
							$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

							$institution_id = $_POST["institution_id"];
							$course_id = $_POST["course_id"];
							$children_schooling = $_POST["children_schooling"];
							$medical_insurance = $_POST["medical_insurance"];
							$job_security = $_POST["job_security"];
							$culture = $_POST["culture"];
							$interest = $_POST["interest"];
							$financial_status = $_POST["financial_status"];
							$computer_skills = $_POST["computer_skills"];
							$office_experience = $_POST["office_experience"];

							if (empty($institution_id)) {
								$error = true;
								$institution_id_err = "Institution not selected";
							}
							if (empty($course_id)) {
								$error = true;
								$course_id_err = "Course not selected";
							}
							if (empty($children_schooling)) {
								$error = true;
								$children_schooling_err = "children schooling not selected";
							}
							if (empty($medical_insurance)) {
								$error = true;
								$medical_insurance_err = "Medical insurance not selected";
							}
							if (empty($job_security)) {
								$error = true;
								$job_security_err = "Job security not selected";
							}
							if (empty($culture)) {
								$error = true;
								$culture_err = "Culture not selected";
							}
							if (empty($interest)) {
								$error = true;
								$interest_err = "Interest not selected";
							}
							if (empty($financial_status)) {
								$error = true;
								$financial_status_err = "Financial status not selected";
							}
							if (empty($computer_skills)) {
								$error = true;
								$computer_skills_err = "Computer skills not selected";
							}
							if (empty($office_experience)) {
								$error = true;
								$office_experience_err = "Office experience not selected";
							}

							if (!$error) {
								$total = $children_schooling + $medical_insurance + $job_security + $culture + $interest + $financial_status + $computer_skills + $office_experience;
								$total *= 4;

								if($total > 40){
									echo "
									<div class='card-panel center-align'>
										<h3>You are eligible to apply for this course</h3>
										<a href='single_result.php?institution=$institution_id&course_id=$course_id' class='btn waves-effect waves-light'>Check Course requirements</a>
									</div>";
								}else{
									echo "
									<div class='card-panel center-align'>
										<h3>Your test is poor to apply for this course</h3>
										<a href='single_result.php?institution=$institution_id&course_id=$course_id' class='btn waves-effect waves-light'>Check Course requirements</a>
									</div>";
								}
							}else{
								if (!empty($institution_id_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$institution_id_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($course_id_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$course_id_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($children_schooling_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$children_schooling_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($medical_insurance_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$medical_insurance_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($job_security_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$job_security_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($culture_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$culture_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($interest_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$interest_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($financial_status_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$financial_status_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($computer_skills_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$computer_skills_err." <i class='close mdi mdi-close'></i></div>";
								}
								if (!empty($office_experience_err)) {
									echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$office_experience_err." <i class='close mdi mdi-close'></i></div>";
								}
							}
							
						}
					?>
					<form action="test.php" method="post">
						<div class="row">
					        <div class="input-field col s6">
							    <select name="institution_id" id="institution_id">
							      <option value="" disabled selected>Choose your option</option>
							      <?php  
							      	$iq = mysqli_query($dbc, "SELECT * FROM institutions");
							      	while($id = mysqli_fetch_array($iq)):
							      ?>
									<option value="<?php echo $id['institution_id'] ?>"><?php echo $id["institution_name"]; ?></option>
							      <?php endwhile ?>
							    </select>
							    <label for="institution_id">Institution</label>
							 </div>
							 <div class="input-field col s6">
							    <select  name="course_id" id="course_id">
							      <option value="" disabled selected>Choose your option</option>
							      <?php  
							      	$cq = mysqli_query($dbc, "SELECT * FROM courses");
							      	while ($cd = mysqli_fetch_array($cq)):
							      ?>
									<option value="<?php echo $cd['course_id'] ?>"><?php echo $cd["course_name"] ?></option>
							  	  <?php endwhile ?>
							    </select>
							    <label for="course_id">Course:</label>
							 </div>
						</div>
						<div class="row">
							 <div class="input-field col s6">
							    <select  name="children_schooling" id="children_schooling">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="children_schooling">Children Schooling:</label>
							 </div>
					        <div class="input-field col s6">
							    <select name="medical_insurance" id="medical_insurance">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="medical_insurance">Medical Insurance:</label>
							 </div>
						</div>
						<div class="row">
					        <div class="input-field col s6">
							    <select name="job_security" id="job_security">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="job_security">Job Security</label>
							 </div>
							 <div class="input-field col s6">
							    <select  name="culture" id="culture">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="culture">Culture</label>
							 </div>
						</div>
						<div class="row">
					        <div class="input-field col s6">
							    <select name="interest" id="interest">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="interest">Interest</label>
							 </div>
							 <div class="input-field col s6">
							    <select  name="financial_status" id="financial_status">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="financial_status">Finanancial Status</label>
							 </div>
						</div>
						<div class="row">
					        <div class="input-field col s6">
							    <select name="computer_skills" id="computer_skills">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="computer_skills">Computer Skills</label>
							 </div>
							 <div class="input-field col s6">
							    <select  name="office_experience" id="office_experience">
							      <option value="" disabled selected>Choose your option</option>
							      <option value="1">Excellent</option>
							      <option value="2">Very Good</option>
							      <option value="3">Good</option>
							      <option value="4">Average</option>
							      <option value="5">Poor</option>
							    </select>
							    <label for="office_experience">Office Experience</label>
							 </div>
						</div>
						<button type="submit" style="display: block;" class="btn waves-effect waves-light btn-large block" name="check" >Test Myself</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- link to footer -->
  	<?php require_once 'includes/footer.php'; ?>

  	<!-- links to external javascript -->
	<?php require_once 'includes/js_includes.php'; ?>
	<script>
		$(document).ready(function() {
		    $('select').material_select();
		});
	</script>
</body
</html>