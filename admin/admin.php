<?php  
session_start();
require_once '../connection.php';

  if(!$_SESSION['admin']){
    header("location:index.php");
  }

  $username = $_SESSION['admin'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Admin Panel | Career Guidance</title>

	<!-- shortcut icon -->
	<link rel="shortcut icon" href="../favicon.png">

	<!-- css -->
	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="navbar-fixed">
		<nav role="navigation" class="teal ">
			<div class="nav-wrapper">
				<a href="admin.php" class="brand-logo center">Admin CG</a>
        <ul id="left">
          <li><a class="toggle"><i class="mdi mdi-menu"></i></a></li>
        </ul>
				<ul class="right ">
					<li><a href="logout.php">logout</a></li>
				</ul>
			</div>
		</nav>
	</div>

  <!-- Page Layout here -->
  <div class="row">
    <aside class=" blue-grey darken-4 hide-on-small-only" id="sidebar">
      <!-- Grey navigation panel -->
      <div class="valign-wrapper sidebar-header">
        
        <div class="row">
          <div class="col s12">
            <?php 
              $sql = "SELECT * FROM `admin` WHERE `username`='$username'";
              $query = @mysqli_query($dbc, $sql);

              while ($row = mysqli_fetch_array($query)) {
                $fullname = $row['fullname'];
                $photo = $row['photo'];
              
            ?>
            <img src="../images/<?php echo $photo; ?>" class="responsive-img circle" alt="" style="width: 100px">
            <div class="white-text">
              <h3 class="h3"><?php echo $fullname; ?></h3>
              <p>Administrator</p>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li><a href="admin.php"><i class="mdi mdi-view-dashboard"></i> Dashboard</a></li>
        <li><a href="admin.php?action=manage_admin"><i class="mdi mdi-settings"></i> Manage Admin</a></li>
        <li><a href="admin.php?action=add_course"><i class="mdi mdi-plus-box"></i> Add Course</a></li>
        <li><a href="admin.php?action=manage_courses"><i class="mdi mdi-settings"></i> Manage Courses</a></li>
        <li><a href="admin.php?action=add_course_career"><i class="mdi mdi-plus-box"></i> Add Career</a></li>
        <li><a href="admin.php?action=manage_career"><i class="mdi mdi-settings"></i> Manage Career </a></li>
        <li><a href="admin.php?action=add_course_requirement"><i class="mdi mdi-plus-box"></i> Add Course requirement</a></li>
        <li><a href="admin.php?action=manage_requirements"><i class="mdi mdi-settings"></i> Manage Course requirements</a></li>
        <li><a href="admin.php?action=add_counselor"><i class="mdi mdi-plus-box"></i> Add Counselor</a></li>
        <li><a href="admin.php?action=manage_counselors"><i class="mdi mdi-settings"></i> Manage Counselors</a></li>
        <li><a href="admin.php?action=add_institution"><i class="mdi mdi-plus-box"></i> Add Institution</a></li>
        <li><a href="admin.php?action=manage_institutions"><i class="mdi mdi-settings"></i> Manage Institutions</a></li>
        <li><a href="logout.php"><i class="mdi mdi-logout"></i> Logout</a></li>
      </ul>
    </aside> <!-- end sidebar -->

    <main id="main" class="section">
      
      <?php  

      if(!isset($_GET['action'])){

      ?>
      <div class="row">
        <h2 class="center-align card-panel flow-text" style="font-weight: bold;">Welcome to admin panel Career Guidance</h2>
        <div class="col s12 m4">
          <div class="card-panel">
            <div class="row">
              <div class="col s8">
                <h5>We currently have</h5>
                <div class="span big">
                  <?php  
                    $select = mysqli_query($dbc, "SELECT COUNT(*) FROM Institutions");
                    if(mysqli_num_rows($select) > 0){
                      $result = mysqli_fetch_array($select);
                      echo $result[0];
                    }else{
                      echo "0";
                    }
                  ?>
                </div>
                <h5>Institutions</h5>
              </div>
              <div class="s4">
                <i class="mdi mdi-school teal-text icon-bg"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <div class="row">
              <div class="col s8">
                <h5>We currently have</h5>
                <div class="span big">
                  <?php  
                    $select = mysqli_query($dbc, "SELECT COUNT(*) FROM courses");
                    if(mysqli_num_rows($select) > 0){
                      $result = mysqli_fetch_array($select);
                      echo $result[0];
                    }else{
                      echo "0";
                    }
                  ?>
                </div>
                <h5>Courses</h5>
              </div>
              <div class="s4">
                <i class="mdi mdi-library-books green-text darken-4 icon-bg"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <div class="row">
              <div class="col s8">
                <h5>We currently have</h5>
                <div class="span big">
                  <?php  
                    $select = mysqli_query($dbc, "SELECT COUNT(*) FROM career");
                    if(mysqli_num_rows($select) > 0){
                      $result = mysqli_fetch_array($select);
                      echo $result[0];
                    }else{
                      echo "0";
                    }
                  ?>
                </div>
                <h5>Career(s)</h5>
              </div>
              <div class="s4">
                <i class="mdi mdi-account-check orange-text icon-bg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col s12">
          <!-- <div class="card-panel">
            <img src="../images/non-bg.png" alt="" class="responsive-img" >
          </div> -->
        </section>
      </div>
      <?php  
        }

        if(isset($_GET['action']) && $_GET['action'] === "add_course"){
          require_once 'includes/add_course.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_courses"){
          require_once 'includes/manage_courses.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "edit_course"){
          require_once 'includes/edit_course.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "delete_course"){
          require_once 'includes/delete_course.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "update_admin"){
          require_once 'includes/update_admin.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_admin"){
          require_once 'includes/manage_admin.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "change_password"){
          require_once 'includes/change_password.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "change_password"){
          require_once 'includes/change_password.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "add_course_requirement"){
          require_once 'includes/add_course_requirement.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_requirements"){
          require_once 'includes/manage_requirements.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "edit_requirements"){
          require_once 'includes/edit_requirements.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "delete_requirement"){
          require_once 'includes/delete_requirements.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "add_institution"){
          require_once 'includes/add_institution.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_institutions"){
          require_once 'includes/manage_institutions.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "edit_institution"){
          require_once 'includes/edit_institution.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "delete_institution"){
          require_once 'includes/delete_institution.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "add_course_career"){
          require_once 'includes/add_course_career.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_career"){
          require_once 'includes/manage_course_career.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "edit_career"){
          require_once 'includes/edit_career.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "delete_career"){
          require_once 'includes/delete_career.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "add_counselor"){
          require_once 'includes/add_counselor.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "manage_counselors"){
          require_once 'includes/manage_counselors.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "edit_counselor"){
          require_once 'includes/edit_counselor.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "delete_counselor"){
          require_once 'includes/delete_counselor.php';
        }

      ?>
    </main> <!-- end main -->
  </div>

	
	<script src="../js/jquery.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
    $(".toggle").on("click", function(){
      $("#sidebar").toggle();
      $("#main").toggleClass('margin');;
    });
  </script>
</body>
</html>