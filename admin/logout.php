<?php  
session_start();

if(!$_SESSION['admin']){
  header("location:index.php");
}else{
	session_destroy();
	unset($_SESSION['admin']);
	header("location: index.php");
}

?>