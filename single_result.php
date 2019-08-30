<?php  
require_once 'connection.php';

$institution = $_GET["institution"];
$course_id = $_GET["course_id"];
$course_name;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />
	<title>Search Result</title>

	<!-- shortcut icon -->
	<link rel="shortcut icon" href="favicon.png">

	<!-- css -->
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <style>
  	@media print{
  		footer, button.btn{
  			display:  none;
  		}
  	}
  </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col m12 center-align">
				<?php  
					$query = mysqli_query($dbc, "SELECT * FROM institutions WHERE institution_id='$institution'");
					while ($data = mysqli_fetch_array($query)) {
						$institution_name = $data["institution_name"];
						$website = $data["website"];
				?>
				<h1><?php echo $institution_name; ?></h1>
				<h5 class="flow-text"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></h5>
				<?php } ?>
				<button class="btn" onclick="window.print()">Print</button>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m7">
				<h4 class="flow-text">Course Description</h4>
				<div class="">
					<table class="bordered striped">
							<thead>
								<tr>
									<th width="25%">Name</th>
									<th>Descripting</th>
								</tr>
							</thead>
							<tbody>
								<?php  
									$query = mysqli_query($dbc, "SELECT courses.course_name, requirements.jamb_subjects, requirements.jamb_score, requirements.waec_passes, courses.course_desc FROM courses INNER JOIN requirements ON courses.course_id=requirements.course_id AND requirements.institution_id='$institution' AND requirements.course_id='$course_id'");
									while ($data = mysqli_fetch_array($query)) {
										$course_name = $data["course_name"];
									?>
									<tr>
										<td>Course Name</td>
										<td><?php echo $data["course_name"]; ?></td>
									</tr>
									<tr>
										<td>Jamb Subjects</td>
										<td><?php echo $data["jamb_subjects"]; ?></td>
									</tr>
									<tr>
										<td>Jamb Score</td>
										<td><?php echo $data["jamb_score"]; ?></td>
									</tr>
									<tr>
										<td>WAEC Passes</td>
										<td><?php echo $data["waec_passes"]; ?></td>
									</tr>
									<tr>
										<td>Courese Description</td>
										<td><?php echo $data["course_desc"]; ?></td>
									</tr>
									<?php } 
								?>	
							</tbody>
						</table>
				</div>
			</div>
			<div class="col s12 m5">
				<h4 class="flow-text">Other resources</h4>
					<div class="">
						<table class="bordered striped">
							<thead>
								<tr>
									<th width="">Name</th>
									<th width="">Resources</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Wikipedia</td>
									<td>read more on <a href="https://en.wikipedia.org">wikpedia</a></td>
								</tr>
								<tr>
									<td>Linkedin</td>
									<td>View jobs on <a href="www.linkedin.com">linkedin</a></td>
								</tr>
								<tr>
									<td>Jobber man</td>
									<td>View Jobs on <a href="www.jobberman.com">Jober Man</a></td>
								</tr>
								<tr>
									<td>EDX</td>
									<td>Study free on <a href="https://www.edx.org">edx.org</a></td>
								</tr>
							</tbody>
						</table>	
					</div>
				<h4>Counselor(s)</h4>
				<table class="bordered striped">
					<thead>
						<tr>
							<th>Counselor Name</th>
							<th>Email</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$gq = mysqli_query($dbc, "SELECT * FROM counselors WHERE course_id='$course_id'");
							while($d = mysqli_fetch_array($gq)):
						?>
						<tr>
							<td><?php echo $d["name"]; ?></td>
							<td><?php echo $d["email"]; ?></td>
							<td><?php echo $d["phone"]; ?></td>
						</tr>
					<?php endwhile ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<!-- link to footer -->
  <?php require_once 'includes/footer.php'; ?>

  <!-- links to external javascript -->
	<?php require_once 'includes/js_includes.php'; ?>
</body>
</html>