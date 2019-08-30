<?php  
session_start();
error_reporting(0);

require_once '../connection.php';
$error = false;
$usernameErr = $passwordErr = $message = "";

if(isset($_POST["login"])){
  if (empty($_POST['username'])) {
    $usernameErr = "Username is empty";
    $error = true;
  }elseif (checkUser($_POST['username'], $dbc) === false) {
    $usernameErr = "Username does not exist";
    $error = true;
  }else{
    $username = check_input($_POST["username"]);
  }

  if(empty($_POST["password"])){
    $passwordErr = "Password is empty";
    $error = true;
  }else{
    $password = check_input($_POST["password"]);
  }

  if(!$error){
    $username = strtolower($username);
    $password = md5($password);

    $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'  LIMIT 1";
    $query = mysqli_query($dbc, $sql);

    if(mysqli_num_rows($query) > 0){
      $_SESSION['admin'] = $username;
      header("Location: admin.php");
      mysqli_close($dbc);
    }else{
      $message = "Invalid password";
      mysqli_close($dbc);
    }
  }

}

function checkUser($username, $dbc){
  $username = strtolower(check_input($username));
  $q = "SELECT `username` FROM `admin` WHERE `username`='$username'";
  $rq = @mysqli_query($dbc, $q);
  return (mysqli_num_rows($rq) > 0) ? true : false;
}

function check_input($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="" />

	<title>Career Guidance</title>

	<!-- shortcut icon -->
	<link rel="shortcut icon" href="../favicon.png">

	<!-- css -->
	<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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

	<div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h4 class="center-align orange-text accent-2">Login to admin panel</h4>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m4 offset-m4">
          <?php 
          if(!empty($usernameErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$usernameErr."<i class='close mdi mdi-close'></i></div>";
          }
          if(!empty($passwordErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$passwordErr."<i class='close mdi mdi-close'></i></div>";
          }
          if(!empty($message)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$message."<i class='close mdi mdi-close'></i></div>";
          }
          ?>
          <div class="card-panel hoverable">
            <form action="" method="POST">
              <div class="input-field">
                <i class="mdi mdi-account prefix"></i>
                <input id="username" type="text" value="<?php echo $username; ?>" class="validate" name="username" autofocus required>
                <label for="username">Username:</label>
              </div>
              <div class="input-field">
                <i class="mdi mdi-lock-open-outline prefix"></i>
                <input id="password" type="password" class="validate" name="password" >
                <label for="password" required>Password:</label>
              </div>
              <br>
              <button class="btn waves-effect hoverable waves-light block orange lighten-2" type="submit" name="login">Login
              </button>
            </form>
          </div>
      </div>
    </div>
  </div>

	<script src="../js/jquery.min.js"></script>
  <script src="../js/materialize.js"></script>
</body>
</html>