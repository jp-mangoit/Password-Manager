<?php

/**
 * 
 */
include("controllers/db_controller.php");

class login_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

    public function login()
    {
		if(isset($_POST["submit"])){
			if(preg_match("/@/", $_POST["email"]) == false){
				return $form_err = "Invalid E-Mail";
			}
			else{
				$success = $this->obj->fetch($_POST["email"]);
				if($success == "-1"){
					return $user_err = "User does not exist";
				}
				elseif(password_verify($_POST["pass"], $success)){
					session_start();
					$_SESSION['email'] = $_POST["email"]; 
					session_commit();     
					header("Location: dashboard.php");			
				}
				else{
					return $user_err = "Incorrect Password"; 
				}
			}
		}
    }

}
?>