<?php  
session_start();
require_once '../connection.php';

  if(!$_SESSION['counsellor']){
    header("location:".ROOT_URL."/counsellor_login.php");
  }

  $email = $_SESSION['counsellor'];
  $counsellor_id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Counsellor | Career Guidance</title>

	<!-- shortcut icon -->
	<link rel="shortcut icon" href="../favicon.png">

	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />

  <style>
    .chip{
      width: 100% !important;
      color: #fff;
      height: 40px;
      line-height: 40px;
      font-size: 18px;
    }
    .chip i.close{
      line-height: 40px;
      font-size: 20px;
    }
  </style>

</head>
<body>
	<div class="navbar-fixed">
		<nav role="navigation" class="teal ">
			<div class="nav-wrapper">
				<a href="index.php" class="brand-logo center">Counsellor CG</a>
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
              $sql = "SELECT * FROM `counselors` WHERE `email`='$email'";
              $query = @mysqli_query($dbc, $sql);

              while ($row = mysqli_fetch_array($query)) {
                $fullname = $row['name'];
                $counsellor_id = $row['id'];
            ?>

            <div class="white-text center-align">
              <h3 class="h3"><?php echo $fullname; ?></h3>
              <p>Counsellor</p>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li><a href="index.php"><i class="mdi mdi-view-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?action=students"><i class="mdi mdi-settings"></i> Students</a></li>
        <li><a href="index.php?action=students_scores"><i class="mdi mdi-settings"></i> Students Scores</a></li>
        <li><a href="index.php?action=messages"><i class="mdi mdi-settings"></i> Messages</a></li>
        <li><a href="logout.php"><i class="mdi mdi-logout"></i> Logout</a></li>
      </ul>
    </aside> <!-- end sidebar -->

    <main id="main" class="section">
      
      <?php  

      if(!isset($_GET['action'])){

      ?>
      <div class="row">
        <h2 class="center-align card-panel flow-text" style="font-weight: bold;">Welcome to Counsellor Dashboard Career Guidance</h2>
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
                    $select = mysqli_query($dbc, "SELECT COUNT(*) FROM students");
                    if(mysqli_num_rows($select) > 0){
                      $result = mysqli_fetch_array($select);
                      echo $result[0];
                    }else{
                      echo "0";
                    }
                  ?>
                </div>
                <h5>Student</h5>
              </div>
              <div class="s4">
                <i class="mdi mdi-account-check green-text darken-4 icon-bg"></i>
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

        if(isset($_GET['action']) && $_GET['action'] === "students"){
          require_once 'includes/students.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "my_account"){
          require_once 'includes/my_account.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "students_scores"){
          require_once 'includes/students_scores.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "messages"){
          require_once 'includes/messages.php';
        }else if(isset($_GET['action']) && $_GET['action'] === "read_reply"){
          require_once 'includes/read_reply.php';
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
      $("#main").toggleClass('margin');
      $('.chips').material_chip();
    });
  </script>
</body>
</html>