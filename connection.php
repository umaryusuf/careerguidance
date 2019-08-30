<?php  
	DEFINE("DB_HOST", "localhost");
	DEFINE("DB_USER", "root");
	DEFINE("DB_PASSWORD", "root");
	DEFINE("DB_NAME", "careerguidance");
	DEFINE("ROOT_URL", "http://localhost/careerguidance");

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)

	OR die('Could not connect to Mysql'.mysqli_connect_error());


?>