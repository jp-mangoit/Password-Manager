<?php

	require_once("controllers/db_controller.php");
	$obj = new db_controller();
?>

<?php

	session_start(); 
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	$obj->clearallpass($_SESSION['email']);
	header("Location: dashboard.php");

?>