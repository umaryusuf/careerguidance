<?php  
session_start();

if(!$_SESSION['student']){
  header("location:index.php");
}else{
	// session_destroy();
	unset($_SESSION['student']);
	header("location: index.php");
}

?>