<?php  
session_start();
$page_title = "student";
require_once 'connection.php';

if(isset($_SESSION["student"])){
  header("Location:".ROOT_URL."/student");
}

$error = false;
$emailErr = $passwordErr = $message = $email = "";

if(isset($_POST["login"])){
  if (empty($_POST['email'])) {
    $emailErr = "email is empty";
    $error = true;
  }elseif (checkUser($_POST['email'], $dbc) === false) {
    $emailErr = "email does not exist";
    $error = true;
  }else{
    $email = check_input($_POST["email"]);
  }

  if(empty($_POST["password"])){
    $passwordErr = "Password is empty";
    $error = true;
  }else{
    $password = check_input($_POST["password"]);
  }

  if(!$error){
    $email = strtolower($email);
    $password = md5($password);

    $sql = "SELECT * FROM `students` WHERE `email`='$email' AND `password`='$password'  LIMIT 1";
    $query = mysqli_query($dbc, $sql);

    if(mysqli_num_rows($query) > 0){
      $_SESSION['student'] = $email;
      header("Location:".ROOT_URL."/student");
      mysqli_close($dbc);
    }else{
      $message = "Invalid password";
      mysqli_close($dbc);
    }
  }

}

function checkUser($email, $dbc){
  $email = strtolower(check_input($email));
  $q = "SELECT `email` FROM `students` WHERE `email`='$email'";
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

  <title>Student Login | Careeer Guidance</title>

  <!-- shortcut icon -->
  <link rel="shortcut icon" href="favicon.png">

  <!-- css -->
  
  <?php require_once 'includes/external.php'; ?>

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

  <?php require_once 'includes/nav.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h5 class="center-align orange-text accent-2">Student Login</h5>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m4 offset-m4">
          <?php 
          if(!empty($emailErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$emailErr."<i class='close mdi mdi-close'></i></div>";
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
                <input id="email" type="text" value="<?php echo $email; ?>" class="validate" name="email" autofocus required>
                <label for="email">Email:</label>
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
          <h6>Don't have an account? <a href="register.php">create account</a></h6>
      </div>
    </div>
  </div>

  <?php require_once 'includes/js_includes.php'; ?>

</body>
</html>