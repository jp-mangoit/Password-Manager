<?php 

/**
 * 
 */
include("controllers/db_controller.php");

class register_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

    public function registerUser()
    {
		if(isset($_POST["submit"])){
			if(preg_match("/@/", $_POST["email"]) == false){
				return $form_err = "Invalid E-Mail";
			}
			elseif($_POST["pass"] != $_POST["cpass"]){
				return $form_err = "Invalid Credentials";
			}
			else{
				$token = openssl_random_pseudo_bytes(10);
				$token = bin2hex($token);
				$hashed_password = password_hash($_POST["pass"], PASSWORD_BCRYPT);
				$success = $this->obj->register($_POST["email"], $hashed_password, $token);
				if($success == "1"){
					return $success;
				}
			}
		}
    }
}
?>