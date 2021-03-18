<?php 

/**
 * 
 */
include("controllers/db_controller.php");

class activate_controller extends db_controller
{
	private $obj;
	public function __construct()
	{
		$db = new db_controller();
		$this->obj = $db;
    }

    public function activate()
    {
		if(isset($_GET["id"]) && isset($_GET["key"])){
			$success = $this->obj->fetchtoken($_GET["id"]);
			if($success == $_GET["key"]){
				$temp = activate($_GET["id"]);
				if($temp == "1"){
					$showdiv = "1";
				}
				else{
					$showdiv = "3";
				}
			}
			else{
				$showdiv = "2";
			}
		}
		else{
			echo "Invalid URL";
		}
    }
	
}

?>