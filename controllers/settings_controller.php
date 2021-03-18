<?php 
	
/**
 * 
 */
include("controllers/db_controller.php");

class settings_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

    public function setting()
    {
    	session_start(); 
		if(!isset($_SESSION['email'])){
			header("Location: login.php");
		}

		if(isset($_POST['change_pass'])){
			$userpass = $this->obj->fetch($_SESSION['email']);
			if(password_verify($_POST['cpass'], $userpass)){
				if($_POST['npass'] == $_POST['cnpass']){
					$user_err = "";
					$hashed_password = password_hash($_POST["npass"], PASSWORD_BCRYPT);
					$this->obj->resetpass($_SESSION['email'], $hashed_password);
					return $user_err = "Password Changed";
				}
				else{
					return $user_err = "Passwords do not match";
				}
			}
			else{
				return $user_err = "Incorrect Password";
			}
		}

		if(isset($_POST['del_acc'])){
			$userpass = $this->obj->fetch($_SESSION['email']);
			if(password_verify($_POST['cpass'], $userpass)){
				$del_err = "";
				$this->obj->clearallpass($_SESSION['email']);
				$this->obj->deletefromusers($_SESSION['email']);
				return $showalert = "1";
			}
			else{
				$del_err = "Incorrect Password";
				return $showalert = "";
			}
		}
    }

}
?>