<?php 

	require_once 'connection.php'; 
	$q = $_GET['q'];

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
	  body{
		  padding-top: 0;
		  font-family: ubuntu;
		}
  	.brand-logo{
		  font-family: pacifico;
		  font-weight: bolder;
		}
  </style>
</head>
<body>
	<nav class="orange" role="navigation">
    <div class="nav-wrapper">
    	<a href="#" class="brand-logo center">CG</a>
    	<!-- activate side-bav in mobile view -->
			<a href="#" data-activates="mobile" class="button-collapse"><i class="mdi mdi-menu"></i></a>
      <form role="form" action="search_result.php" method="GET" style="display: inline-flex;" enctype="multipart/form-data">
        <div class="input-field">
          <input id="search" type="search" value="<?php echo $q; ?>" required name="q" placeholder="Enter profession" autofocus>
          <label for="search"><i class="mdi mdi-magnify"></i></label>
        </div>
        <button type="submit" class="btn waves-effect waves-light white orange-text" style="height: auto">Search</button>
      </form>
      <ul class="right hide-on-med-and-down">
        <li class="<?php echo ($page_title == 'home') ? 'active' : '' ?>">
        	<a href="index.php">Home</a>
        </li>
				<li class="<?php echo ($page_title == 'counsellor') ? 'active' : '' ?>">
					<a href="counsellor_login.php">Counsellor</a>
					</li>
				<li class="<?php echo ($page_title == 'student') ? 'active' : '' ?>">
					<a href="student_login.php">Student</a>
				</li>
				<li class="<?php echo ($page_title == 'about') ? 'active' : '' ?>">
					<a href="about.php">About</a>
				</li>
				<li class="<?php echo ($page_title == 'contact') ? 'active' : '' ?>">
					<a href="contact.php">Contact</a>
				</li>
      </ul>
      <!-- navbar for mobile -->
			<ul class="side-nav" id="mobile">
				<li class="<?php echo ($page_title == 'home') ? 'active' : '' ?>">
					<a href="index.php">Home</a>
					</li>
				<li class="<?php echo ($page_title == 'about') ? 'active' : '' ?>">
					<a href="about.php">About</a>
					</li>
				<li class="<?php echo ($page_title == 'counsellor') ? 'active' : '' ?>">
					<a href="counsellor_login.php">Counsellor</a>
					</li>
				<li class="<?php echo ($page_title == 'student') ? 'active' : '' ?>">
					<a href="student_login.php">Student</a>
				</li>
				<li class="<?php echo ($page_title == 'contact') ? 'active' : '' ?>">
					<a href="contact.php">Contact</a>
					</li>
			</ul>
    </div>
  </nav>
	
	<section class="container">
		
	
	<?php  

	function check_input($data){
	  $data = trim($data);
	  $data = stripcslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$q = check_input($q);

	$sql = "SELECT career.career_title, career.course_id, career.career_desc, requirements.institution_id FROM career, requirements where career.course_id = requirements.course_id AND career.career_keywords LIKE '%$q%' ORDER BY career.career_title ASC";
	$result = mysqli_query($dbc, $sql);

	// "SELECT career.career_title, career.course_id, career.career_desc, institutions.id, institutions.institution_name FROM career INNER JOIN `institutions` ON `career`.`course_id`=institutions.course_id AND career.career_title Like '%$q%' ORDER BY career.career_title ASC"


	if(mysqli_num_rows($result) > 0){
		echo "<ul>";
		while($row = mysqli_fetch_array($result)){	
						
	?>
	
		<li>
			<a href="single_result.php?institution=<?php echo $row["institution_id"];?>&course_id=<?php echo $row["course_id"] ?>">
				<div class="card-panel">
					<h5><?php echo ucwords($row['career_title']); ?></h5>
					<h6 class="green-text">
						<?php 
							$query = mysqli_query($dbc, "SELECT institution_name FROM institutions where institution_id=".$row['institution_id']);
							while ($data = mysqli_fetch_array($query)) {
								echo $data["institution_name"];
							}

						 ?>
					</h6>
					<p class="black-text"><?php echo $row['career_desc']; ?></p>
				</div>
			</a>
		</li>
	
	<?php 
	}
	echo "</ul>";
	}else{
		echo "No search result found";
	}

	?>

	</section>
	<!-- link to footer -->
  <?php require_once 'includes/footer.php'; ?>

  <!-- links to external javascript -->
	<?php require_once 'includes/js_includes.php'; ?>
</body>
</html>