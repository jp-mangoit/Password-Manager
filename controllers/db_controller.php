<?php

/**
 * 
 */
class db_controller
{

	function __construct()
	{
		$this->createConn();
	}

 	function createConn(){
 		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pmanager";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
 	}

	function register($email, $pass, $token){
		$conn = $this->createConn();
		$sql = "INSERT INTO users VALUES('".$email."', '".$pass."', '0');";
		if ($conn->query($sql) === TRUE) {
    		$success = "1";
		} else {
    		$success = "2";
		}
		return $success;
	}

	function fetch($email){
		$conn = $this->createConn();
		$sql = "SELECT * FROM users WHERE email = '".$email."' AND token = '0';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
        		$success = $row["pass"];
        		return $success;
    		}
		} else {
    		$success = "-1";
    		return $success;
		}
	}

	function activate($email){
		$conn = $this->createConn();
		$sql = "UPDATE users SET token = '0' WHERE email = '".$email."';";
		if ($conn->query($sql) === TRUE) {
    		$success = "1";
		} else {
    		$success = "2";
		}
		return $success;
	}

	function resetpass($email, $pass){
		$conn = $this->createConn();
		$sql = "UPDATE users SET pass = '".$pass."', token = '0' WHERE email = '".$email."';";
		if ($conn->query($sql) === TRUE) {
    		$success = "1";
		} else {
    		$success = "2";
		}
		return $success;
	}

	function fetchtoken($email){
		$conn = $this->createConn();
		$sql = "SELECT token FROM users WHERE email = '".$email."';";
		$result = $conn -> query($sql);
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
        		$success = $row["token"];
        		return $success;
    		}
		} else {
    		$success = "-1";
    		return $success;
		}
	}

	function forgotpass($email, $token){
		$conn = $this->createConn();
		$sql = "UPDATE users SET token = '".$token."' WHERE email = '".$email."';";
		if ($conn->query($sql) === TRUE) {
    		$success = "1";
		} else {
    		$success = "2";
		}
		return $success;
	}

	function addpass($user, $name, $loginid, $password){
		$conn = $this->createConn();
		$sql = "INSERT INTO passwords(user, name, loginid, password) VALUES('".$user."', '".$name."', '".$loginid."', '".$password."');";
		if($conn -> query($sql) === TRUE){
			return "1";
		}
		else{
			return "-1";
		}
	}

	function retrievepass($user){
		$conn = $this->createConn();
		$sql = "SELECT * FROM passwords WHERE user = '".$user."';";
		$result = $conn -> query($sql);
		if($result -> num_rows > 0){
			$GLOBALS['nopass'] = "";
			while($row = $result -> fetch_assoc()){
				echo "<tr><td id='wname'>{$row["name"]}</td><td id='tloginid'>{$row['loginid']}</td><td style='text-align: center;'><input style='text-align: center;' type='password' class='passfield' name='password' value={$row['password']} disabled /></td><td style='text-align: center;'><a href='https://{$row["name"]}' target='_blank'>Launch</a></td><td style='text-align: center;'><a class='removebtn' id='{$row['ID']}'>Remove</a></td></tr>";
			}
		}
		else{
			$GLOBALS['nopass'] = "You have not saved any passwords";
		}
	}

	function clearallpass($user){
		$conn = $this->createConn();
		$sql = "DELETE FROM passwords WHERE user = '".$user."';";
		$conn -> query($sql);
	}

	function removepass($id){
		$conn = $this->createConn();
		$sql = "DELETE FROM passwords WHERE ID = '".$id."';";
		$conn -> query($sql);
	}

	function deletefromusers($email){
		$conn = $this->createConn();
		$sql = "DELETE FROM users WHERE email = '".$email."';";
		if($conn -> query($sql) === TRUE){
			return "1";
		}
		else{
			return "0";
		}
	}
}

?> 