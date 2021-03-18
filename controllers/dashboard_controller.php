<?php

/**
 * 
 */
include("controllers/db_controller.php");

class dashboard_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

	public function dashboard()
	{
		session_start();
		if(!isset($_SESSION['email'])){
			header("Location: login.php");
		}

		if(isset($_POST['add'])){
			$success = $this->obj->addpass($_SESSION['email'], $_POST['website'], $_POST['loginid'], $_POST['password']);
			if($success == "1"){
				$user_err = "";
			}
			elseif($success == "-1"){
				$user_err = "Data already exists";
			}
		}
	}
}

?>