<?php  

	if(!$_SESSION['admin']){
    header("location:index.php");
  }
  $id = $_GET["id"];
?>
<section class="col s12 m4 offset-m4">
	<h4 class="center-align">Update admin</h4>
	<div class="card-panel">
    <?php  
      if (isset($_POST["update_admin"]) && !empty($_POST["fullname"]) && !empty($_POST["password"])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = mysqli_query($dbc, "SELECT password FROM admin WHERE id='$id'");
        while($row = mysqli_fetch_array($sql)){
          $pass = $row["password"];
        }
        
        $password = md5($password);

        

        if ($password !== $pass) {
          echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Oops! invalid password<i class='close mdi mdi-close'></i></div>";
        }else{
          $password = md5($password);
          $query = mysqli_query($dbc, "UPDATE admin SET fullname='$fullname', username='$username' WHERE id='$id'");
          if($query){
            echo "<div class='chip light-blue lighten-2 z-depth-1 hoverable'>Admin updated sucessfully<i class='close mdi mdi-close'></i></div>";
          }else{
            echo "<div class='chip red lighten-2 z-depth-1 hoverable'>Error updating admin<i class='close mdi mdi-close'></i></div>";
          }
        }
      }

    ?>
		<form action="admin.php?action=update_admin&id=<?php echo $id; ?>" method="POST" >
      <?php  
        $query = mysqli_query($dbc, "SELECT * FROM admin WHERE id='$id'");
        while ($data = mysqli_fetch_array($query)) {
          $password = md5($data["password"]);
      ?>
      <div class="center">
        <img src="../images/<?php echo $data["photo"]; ?>" class="responsive-img circle z-depth-1" alt="" style="width: 250px; height: 250px">
      </div>
			<div class="input-field">
        <i class="mdi mdi-account-card-details prefix"></i>
        <input id="fullname" type="text" class="validate" name="fullname" value="<?php echo $data["fullname"]; ?>" required autofocus>
        <label for="fullname">Full Name:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-account prefix"></i>
        <input id="username" type="text" class="validate" value="<?php echo $data["username"]; ?>" name="username" required>
        <label for="username">Username:</label>
      </div>
      <div class="input-field">
        <i class="mdi mdi-lock prefix"></i>
        <input id="password" type="password" class="validate" value="" name="password" required>
        <label for="password">Enter password:</label>
      </div>
      <?php } ?>
      <br>
      <button class="btn waves-effect hoverable btn-large waves-light block teal" type="submit" name="update_admin">Update Admin
      </button>
    </form>
	</div>
</section>