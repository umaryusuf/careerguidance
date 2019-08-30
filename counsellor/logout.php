<?php  
session_start();

if(!$_SESSION['counsellor']){
  header("location:index.php");
}else{
	session_destroy();
	unset($_SESSION['counsellor']);
	header("location: index.php");
}

?>