<?php 

include("controllers/db_controller.php");

class forgot_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

	public function forgot()
	{
		if(isset($_POST["submit"])){
			if(preg_match("/@/", $_POST["email"]) == false){
				$form_err = "Invalid E-Mail";
			}
			else{
				$temp1 = $this->obj->fetch($_POST["email"]);
				if($temp1 != "-1") {
					
				} else{
					$form_err = "Please register/activate your account";
				}
			}
		}
	}
}

?>