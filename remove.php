<?php

	require_once("controllers/settings_controller.php");
  	$obj = new settings_controller();

	session_start(); 
	if(!isset($_SESSION['email'])){
		header("Location: login.php");
	}

	if(!isset($_GET['id'])){
		echo "Invalid URL";
	}
	else{
		$obj->removepass($_GET['id']);
		header("Location: dashboard.php");
	}

?>