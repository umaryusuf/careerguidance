<?php  
session_start();
$page_title = "student";
require_once 'connection.php';

if(isset($_SESSION["student"])){
  header("Location:".ROOT_URL."/student");
}

$error = false;
$emailErr = $passwordErr = $message = $email = $fullname = $fullnameErr = $phone = $phoneErr = "";

if(isset($_POST["register"])){

  if (empty($_POST['fullname'])) {
    $fullnameErr = "fullname is empty";
    $error = true;
  }else{
    $fullname = check_input($_POST["fullname"]);
  }

  if (empty($_POST['email'])) {
    $emailErr = "email is empty";
    $error = true;
  }elseif (checkUser($_POST['email'], $dbc) === true) {
    $emailErr = "Email already not exist";
    $error = true;
  }else{
    $email = check_input($_POST["email"]);
  }

  if(empty($_POST["phone"])){
    $phoneErr = "Phone is empty";
    $error = true;
  }else{
    $phone = check_input($_POST["phone"]);
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
    $unique = md5(date("Y-m-d h:i:sa"));

    $sql = "INSERT INTO students(fullname, email, phone, password, student_id) VALUES('$fullname', '$email', '$phone', '$password', '$unique')";

    if(mysqli_query($dbc, $sql)){
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

  <title>Login | Careeer Guidance</title>

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
        <h5 class="center-align orange-text accent-2">Create Student Account</h5>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m4 offset-m4">
          <?php 
          if(!empty($fullnameErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$fullnameErr."<i class='close mdi mdi-close'></i></div>";
          }
          if(!empty($emailErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$emailErr."<i class='close mdi mdi-close'></i></div>";
          }
          if(!empty($phoneErr)){
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>".$phoneErr."<i class='close mdi mdi-close'></i></div>";
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
                <input id="fullname" type="text" value="<?php echo $fullname; ?>" class="validate" name="fullname" autofocus required>
                <label for="fullname">Full Name:</label>
              </div>
              <div class="input-field">
                <i class="mdi mdi-email prefix"></i>
                <input id="email" type="email" value="<?php echo $email; ?>" class="validate" name="email" autofocus required>
                <label for="email">Email:</label>
              </div>
              <div class="input-field">
                <i class="mdi mdi-phone prefix"></i>
                <input id="phone" type="tel" value="<?php echo $phone; ?>" class="validate" name="phone" autofocus required>
                <label for="phone">Phone:</label>
              </div>
              <div class="input-field">
                <i class="mdi mdi-lock-open-outline prefix"></i>
                <input id="password" type="password" class="validate" name="password" >
                <label for="password" required>Password:</label>
              </div>
              <br>
              <button class="btn waves-effect hoverable waves-light block orange lighten-2" type="submit" name="register">Create Account
              </button>
            </form>
          </div>
          <h6>Already have an account? <a href="student_login.php">login here</a></h6>
      </div>
    </div>
  </div>

  <?php require_once 'includes/js_includes.php'; ?>

</body>
</html>